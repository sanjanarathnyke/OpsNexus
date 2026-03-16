<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    protected $fillable = [
        'dev_name',
        'email',
        'pro_name',
        'role',
        'assign_projects',
        'github_username',
        'recent_commits',
        'status',
    ];
}
