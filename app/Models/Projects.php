<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'project_name',
        'description',
        'repo_url',
        'status',
        'progress',
        'payments',
    ];

    public function developers()
    {
        return $this->hasMany(Developers::class, 'pro_name', 'project_name');
    }
}
