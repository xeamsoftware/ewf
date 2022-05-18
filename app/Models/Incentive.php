<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Incentive extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','from','to','percentage','status','incentive_note'];
}
