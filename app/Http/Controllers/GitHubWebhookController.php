<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Developers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GitHubWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $event = $request->header('X-GitHub-Event');
        $payload = $request->all();

        Log::info("GitHub Webhook received: {$event}", ['payload' => $payload]);

        if (!$event) {
            return response()->json(['status' => 'ignored', 'reason' => 'No event type'], 400);
        }

        switch ($event) {
            case 'push':
                $this->handlePush($payload);
                break;
            case 'pull_request':
                $this->handlePullRequest($payload);
                break;
            case 'create':
            case 'delete':
                $this->handleBranchEvent($event, $payload);
                break;
            case 'ping':
                return response()->json(['status' => 'received']);
            default:
                Log::info("Unhandled GitHub event: {$event}");
                break;
        }

        return response()->json(['status' => 'received']);
    }

    private function handlePush($payload)
    {
        $repoUrl = $payload['repository']['html_url'] ?? null;
        $pusherName = $payload['pusher']['name'] ?? 'Unknown';
        $commits = $payload['commits'] ?? [];

        foreach ($commits as $commit) {
            $message = $commit['message'] ?? '';
            $authorUsername = $commit['author']['username'] ?? $pusherName;
            
            $developer = Developers::where('github_username', $authorUsername)->first();
            $devName = $developer ? $developer->dev_name : $authorUsername;

            Description::create([
                'project_repo'    => $repoUrl,
                'developer_name'  => $devName,
                'github_username' => $authorUsername,
                'event_type'      => 'push',
                'description'     => "{$devName} pushed: {$message}",
                'is_read'         => false,
            ]);
        }
    }

    private function handlePullRequest($payload)
    {
        $action = $payload['action'] ?? '';
        $pr = $payload['pull_request'] ?? [];
        $repoUrl = $payload['repository']['html_url'] ?? null;
        $sender = $payload['sender']['login'] ?? 'Unknown';
        $title = $pr['title'] ?? 'No Title';
        $merged = $pr['merged'] ?? false;

        $developer = Developers::where('github_username', $sender)->first();
        $devName = $developer ? $developer->dev_name : $sender;

        $message = "";
        if ($action === 'opened') {
            $message = "{$devName} opened PR: {$title}";
        } elseif ($action === 'closed') {
            if ($merged) {
                $message = "{$devName} merged PR: {$title}";
            } else {
                $message = "{$devName} closed PR: {$title}";
            }
        }

        if ($message) {
            Description::create([
                'project_repo'    => $repoUrl,
                'developer_name'  => $devName,
                'github_username' => $sender,
                'event_type'      => 'pull_request',
                'description'     => $message,
                'is_read'         => false,
            ]);
        }
    }

    private function handleBranchEvent($event, $payload)
    {
        $ref = $payload['ref'] ?? '';
        $refType = $payload['ref_type'] ?? '';
        $repoUrl = $payload['repository']['html_url'] ?? null;
        $sender = $payload['sender']['login'] ?? 'Unknown';

        if ($refType !== 'branch') {
            return;
        }

        $developer = Developers::where('github_username', $sender)->first();
        $devName = $developer ? $developer->dev_name : $sender;

        $actionText = ($event === 'create') ? 'created branch' : 'deleted branch';
        $message = "{$devName} {$actionText}: {$ref}";

        Description::create([
            'project_repo'    => $repoUrl,
            'developer_name'  => $devName,
            'github_username' => $sender,
            'event_type'      => $event,
            'description'     => $message,
            'is_read'         => false,
        ]);
    }
}
