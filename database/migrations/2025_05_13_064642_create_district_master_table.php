<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('DistrictMaster', function (Blueprint $table) {
        $table->id('ID');
        $table->string('DistrictName');
        $table->unsignedBigInteger('StateID');
        $table->boolean('IsActive')->default(true);
        $table->dateTime('CreatedDate')->nullable();
        $table->unsignedBigInteger('CreatedBy')->nullable();
        $table->dateTime('ModifiedDate')->nullable();
        $table->unsignedBigInteger('ModifiedBy')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_master');
    }
};
