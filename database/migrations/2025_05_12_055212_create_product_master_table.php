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
    Schema::create('ProductMaster', function (Blueprint $table) {
        $table->id('ID');
        $table->string('ProductName');
        $table->unsignedBigInteger('SubGroupID');
        $table->boolean('IsActive')->default(true);
        $table->dateTime('CreatedDate')->nullable();
        $table->string('CreatedBy')->nullable();
        $table->dateTime('ModifiedDate')->nullable();
        $table->string('ModifiedBy')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_master');
    }
};
