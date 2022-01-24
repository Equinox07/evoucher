<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = ['serial_no', 'voucher_code', 'sold_out'];



    
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    

    public function scopeNotSold($query)
    {
        return $query->where('sold_out', 0);
    }

    public function scopeSoldOut($query)
    {
        return $query->where('sold_out', 1);
    }
}
