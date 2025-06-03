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
        Schema::create('case_models', function (Blueprint $table) {
            $table->id();
            $table->integer('company_name');
            $table->integer('company_branch');
            $table->string('insurance_ref')->nullable();
            $table->integer('req_no')->nullable();
            $table->string('req_name')->nullable();
            $table->string('req_code')->nullable();
            $table->string('req_email')->nullable();
            $table->string('customer_name')->nullable();
            $table->text('customer_address')->nullable();
            $table->integer('customer_no')->nullable();
            $table->text('inspection_address')->nullable();
            $table->string('vehicle_no');
            $table->string('chassis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->integer('odo_meter')->nullable();
            $table->tinyInteger('rc_verified')->nullable();
            $table->integer('vehicle_category');
            $table->integer('vehicle_manufacturer');
            $table->integer('year')->nullable();
            $table->string('vehicle_variant')->nullable();
            $table->integer('fuel_used')->nullable();
            $table->integer('case_type')->nullable();
            $table->string('vehicle_colour')->nullable();
            $table->tinyInteger('engine_started')->nullable();
            $table->mediumText('remarks')->nullable();
            $table->integer('inspection_status')->nullable();
            $table->integer('payment_mode')->nullable();
            $table->integer('conveyance')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('images')->nullable();
            $table->integer('fo_id');
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
        Schema::dropIfExists('case_models');
    }
};
