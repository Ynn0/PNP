<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'plantilla_item_id',
        'salarygrade',
    ];

    public function plantillaItem()
    {
        return $this->belongsTo(PlantillaItem::class);
    }
}
