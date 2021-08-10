<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvancedSalary;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'photo',
        'nid',
        'salary',
        'vacation',
        'city'
    ];

    public function adsalaries(){
        return $this->hasMany(AdvancedSalary::class);
    }
}
