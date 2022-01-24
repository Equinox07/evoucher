<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schools extends Model
{
    use HasFactory;
    protected $table ='schools';
    protected $fillable = ['name', 'code'];
}
