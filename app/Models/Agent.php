<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['account_type', 'employee_id', 'full_name', 'email', 'phone_number', 'incentive_type', 'flat_amount', 'percentage', 'note'];
}
