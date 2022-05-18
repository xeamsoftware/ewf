<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->string('employee_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('incentive_type');
            $table->string('flat_amount')->nullable();
            $table->string('percentage')->nullable();
            $table->string('note')->nullable();
            $table->enum('status', ['1', '0'])->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('agents');
    }
}
