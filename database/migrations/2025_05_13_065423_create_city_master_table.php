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
    Schema::create('CityMaster', function (Blueprint $table) {
        $table->id('ID');
        $table->string('CityName');
        $table->unsignedBigInteger('DistrictID');
        $table->boolean('IsActive')->default(true);
        $table->dateTime('CreatedDate')->nullable();
        $table->unsignedBigInteger('CreatedBy')->nullable();
        $table->dateTime('ModifiedDate')->nullable();
        $table->unsignedBigInteger('ModifiedBy')->nullable();

        // Foreign key constraint to DistrictMaster table
        $table->foreign('DistrictID')->references('ID')->on('DistrictMaster')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_master');
    }
};
