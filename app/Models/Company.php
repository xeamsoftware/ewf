<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['company_name', 'company_address', 'incorporation', 'status', 'federal_tax', 'authority_name', 'disignation', 'phone', 'fax_no', 'company_email', 'account_name', 'account_email', 'account_phone', 'sales_name', 'sales_email', 'sales_phone', 'note'];
}
