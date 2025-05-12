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
    Schema::create('SubGroupMaster', function (Blueprint $table) {
    $table->integer('ID')->identity(1,1)->primary();
    $table->string('SubGroupName', 255);
    $table->integer('GroupID')->nullable();
    $table->decimal('DiscountPct', 10, 2)->nullable();
    $table->decimal('TaxPct', 10, 2)->nullable();
    $table->boolean('IsActive')->nullable();
    $table->dateTime('CreatedDate')->nullable();
    $table->integer('CreatedBy')->nullable();
    $table->dateTime('ModifiedDate')->nullable();
    $table->integer('ModifiedBy')->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SubGroupMaster');
    }
};
