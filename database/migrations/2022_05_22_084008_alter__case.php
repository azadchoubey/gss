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
        Schema::table('case_models', function (Blueprint $table) {
            $table->tinyInteger('imgstatus')->default(0)->after('fo_id');
            $table->tinyInteger('pdfstatus')->default(0)->after('imgstatus');
            $table->integer('qc_id')->nullable()->after('pdfstatus');
            $table->integer('case_by')->nullable()->after('qc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_models', function (Blueprint $table) {
            //
        });
    }
};
