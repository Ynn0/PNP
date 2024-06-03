<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantillaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'position_title',
        'department_id',
        'salarygrade',

    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
