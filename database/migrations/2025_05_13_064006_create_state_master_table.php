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
       Schema::create('StateMaster', function (Blueprint $table) {
    $table->id('ID');
    $table->string('StateName');
    $table->unsignedBigInteger('CountryID');
    $table->boolean('IsActive')->default(true);
    $table->timestamp('CreatedDate')->nullable();
    $table->unsignedBigInteger('CreatedBy')->nullable();
    $table->timestamp('ModifiedDate')->nullable();
    $table->unsignedBigInteger('ModifiedBy')->nullable();
    $table->string('GSTInit')->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_master');
    }
};
