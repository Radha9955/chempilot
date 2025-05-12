<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('BrandMaster', function (Blueprint $table) {
        $table->id('ID');
        $table->string('BrandName', 255);
        $table->string('BrandDesc', 255);
        $table->boolean('IsActive')->nullable();
        $table->dateTime('CreatedDate')->nullable();
        $table->integer('CreatedBy')->nullable();
        $table->dateTime('ModifiedDate')->nullable();
        $table->integer('ModifiedBy')->nullable();
        $table->integer('BrandOfferTypeId')->nullable();
        $table->unique(['BrandName', 'BrandDesc'], 'UC_UNQName');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_master');
    }
};
