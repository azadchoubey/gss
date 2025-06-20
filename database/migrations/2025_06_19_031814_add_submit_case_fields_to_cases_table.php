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
        Schema::table('cases', function (Blueprint $table) {
            $table->string('submitted_vehicle_no')->nullable()->after('image_count');
            $table->text('fo_remarks')->nullable()->after('submitted_vehicle_no');
            $table->integer('total_img_count')->default(0)->after('fo_remarks');
            $table->decimal('inspection_lat', 10, 8)->nullable()->after('total_img_count');
            $table->decimal('inspection_long', 11, 8)->nullable()->after('inspection_lat');
            $table->timestamp('submitted_at')->nullable()->after('inspection_long');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn([
                'submitted_vehicle_no',
                'fo_remarks', 
                'total_img_count',
                'inspection_lat',
                'inspection_long',
                'submitted_at'
            ]);
        });
    }
};
