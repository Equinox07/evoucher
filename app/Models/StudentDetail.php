<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentDetail extends Model
{
    use HasFactory;
    protected $table = 'students_details';
    protected $fillable = ['student_id', 'school_id', 'location', 'name_of_guardian', 'course', 'image', 'grades'];
}
