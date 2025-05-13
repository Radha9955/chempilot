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
    Schema::create('CountryMaster', function (Blueprint $table) {
        $table->id('ID');
        $table->string('CountryName')->unique(); // UC_CName
        $table->boolean('IsActive')->default(true);
        $table->timestamp('CreatedDate')->nullable();
        $table->integer('CreatedBy')->nullable();
        $table->timestamp('ModifiedDate')->nullable();
        $table->integer('ModifiedBy')->nullable();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_master');
    }
};
