<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwarenessForm extends Model
{
    protected $fillable = [
        'id', 'name', 'mobile', 'course', 'description', 'status', 'created_at', 'updated_at'
        ];
}
