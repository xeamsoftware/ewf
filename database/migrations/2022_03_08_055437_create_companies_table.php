<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('incorporation');
            $table->enum('status', ['1', '0'])->default('1');
            $table->string('federal_tax');
            $table->string('authority_name');
            $table->string('disignation');
            $table->string('phone');
            $table->string('fax_no');
            $table->string('company_email');
            $table->string('account_name');
            $table->string('account_email');
            $table->string('account_phone');
            $table->string('sales_name');
            $table->string('sales_email');
            $table->string('sales_phone');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
