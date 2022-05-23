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
            $table->enum('status', ['1', '0'])->default('1');
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
