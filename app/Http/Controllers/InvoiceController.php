<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Projects;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')->get();
        $projects = Projects::all();
        return view('payments', compact('invoices', 'projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Invoice::create($validated);

        return redirect()->back()->with('success', 'Invoice created successfully!');
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $invoice->update($validated);

        return redirect()->back()->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Invoice deleted successfully!');
    }
}
