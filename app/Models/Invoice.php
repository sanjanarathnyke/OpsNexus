<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_name',
        'project_name',
        'amount',
        'status',
        'due_date',
    ];
}
