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
            $table->increments('ID');  // Use increments for auto-incrementing ID
            $table->string('SubGroupName', 255);
            $table->integer('GroupName')->nullable();  // Assuming this is referencing a group
            $table->decimal('DiscountPct', 10, 2)->nullable();
            $table->decimal('TaxPct', 10, 2)->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->integer('ModifiedBy')->nullable();
            $table->timestamps(0);  // Adds created_at and updated_at columns (optional)
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
