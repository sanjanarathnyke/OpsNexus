<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'project_repo',
        'developer_name',
        'github_username',
        'event_type',
        'description',
        'is_read',
    ];
}
