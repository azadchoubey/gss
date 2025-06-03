<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuation_models', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('valuation_case_type');
            $table->tinyInteger('transmission');
            $table->tinyInteger('ownership');
            $table->tinyInteger('rc_status');
            $table->tinyInteger('insurance_policy');
            $table->date('insurance_validity');
            $table->tinyInteger('body_condition');
            $table->tinyInteger('rate_vehicle');
            $table->tinyInteger('hpa');
            $table->string('hpa_bank');
            $table->string('loan_number');
            $table->float('valuation_price');
            $table->text('valuation_remarks');
            $table->string('v_image');
            $table->integer('qc_id');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('pdfstatus')->default(0);
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
        Schema::dropIfExists('valuation_models');
    }
};
