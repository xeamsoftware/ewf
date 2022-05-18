<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('placement_type');
            $table->string('client_msa')->nullable();
            $table->string('client_purchase_order')->nullable();
            $table->string('client_insurance')->nullable();
            $table->string('vendor_msa')->nullable();
            $table->string('vendor_purchase_order')->nullable();
            $table->string('vendor_insurance')->nullable();
            $table->string('vendor_w9')->nullable();
            $table->string('offer_letter_w2')->nullable();
            $table->string('w4_form_w2')->nullable();
            $table->string('I9_form_w2')->nullable();
            $table->string('e_verify_authorization_w2')->nullable();
            $table->string('ach_form_w2')->nullable();
            $table->string('void_check_w2')->nullable();
            $table->string('visa_copy_w2')->nullable();
            $table->string('id_proof_w2')->nullable();
            $table->string('offer_letter_1099')->nullable();
            $table->string('w4_form_1099')->nullable();
            $table->string('I9_form_1099')->nullable();
            $table->string('ach_form_1099')->nullable();
            $table->string('void_check_1099')->nullable();
            $table->string('visa_copy_1099')->nullable();
            $table->string('id_proof_1099')->nullable();
            $table->string('full_name')->nullable();
            $table->string('location')->nullable();
            $table->string('work_authorization')->nullable();
            $table->date('visa_expirary')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('ssn_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('condidate_rate')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('end_client_name')->nullable();
            $table->string('end_client_address')->nullable();
            $table->string('position_title')->nullable();
            $table->date('start_date')->nullable();
            $table->string('end_client_rate')->nullable();
            $table->string('through_company')->nullable();
            $table->string('company_name')->nullable();
            $table->string('through_agent')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('placement_commission')->nullable();
            $table->string('commission_amount')->nullable();
            $table->string('internal_recruiter')->nullable();
            $table->softDeletes(); // this will create deleted_at field for softdelete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultants');
    }
}
