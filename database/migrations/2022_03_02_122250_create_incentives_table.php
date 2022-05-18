<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('percentage')->nullable();
            $table->enum('status', ['1','0'])->default('1'); // 1 for active 0 In Active
            $table->text('incentive_note')->nullable();
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
        Schema::dropIfExists('incentives');
    }
}
