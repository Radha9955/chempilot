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
    Schema::create('display_master', function (Blueprint $table) {
        $table->id('ID');
        $table->string('DisplayName');
        $table->unsignedBigInteger('ItemID');
        $table->unsignedBigInteger('BranchID');
        $table->boolean('IsActive')->default(true);
        $table->timestamp('CreatedDate')->nullable();
        $table->unsignedBigInteger('CreatedBy')->nullable();
        $table->timestamp('ModifiedDate')->nullable();
        $table->unsignedBigInteger('ModifiedBy')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('display_master');
    }
};
