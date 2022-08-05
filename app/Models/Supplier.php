<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStatusAttribute($value)
    {
        echo $value === ('yes') ? '<span class="badge badge-pill badge-success mt-1">فعال</span>' : '<span class="badge badge-pill badge-danger mt-1">موقوف</span>' ;

    }
}
