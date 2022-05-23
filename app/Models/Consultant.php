<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ConsultantDocument;

class Consultant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['placement_type', 'client_msa', 'client_purchase_order', 'client_insurance', 'vendor_msa', 'vendor_purchase_order', 'vendor_insurance', 'vendor_w9', 'offer_letter_w2', 'w4_form_w2', 'I9_form_w2', 'e_verify_authorization_w2', 'ach_form_w2', 'void_check_w2', 'visa_copy_w2', 'id_proof_w2', 'offer_letter_1099', 'w4_form_1099', 'I9_form_1099', 'ach_form_1099', 'void_check_1099', 'visa_copy_1099', 'id_proof_1099', 'full_name', 'location', 'work_authorization', 'visa_expirary', 'contact_number', 'email', 'ssn_number', 'date_of_birth', 'condidate_rate', 'employee_name', 'end_client_name', 'end_client_address', 'position_title', 'start_date', 'end_client_rate', 'through_company', 'company_name', 'through_agent', 'agent_name', 'placement_commission', 'commission_amount', 'internal_recruiter'];

    public function consultantDoc()
    {
        return $this->hasMany(ConsultantDocument::class, 'consultant_id');
    }
}
