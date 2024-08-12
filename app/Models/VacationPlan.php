<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationPlan extends Model
{
    use HasFactory;
    protected $table = 'vacation_plans';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'participants',
    ];

    public $timestamps = true;

    protected $casts = [
        'date' => 'date',
    ];
}
