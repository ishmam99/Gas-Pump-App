<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
     protected $fillable = [
        'client_id',
        'fuel_id',
        'paid_amount',
        'due_amount',
        'total_amount',
        'quantity',
        'vehicle_id',
        'employee_id',
        'company_id',
        'phone'
    ];
}
