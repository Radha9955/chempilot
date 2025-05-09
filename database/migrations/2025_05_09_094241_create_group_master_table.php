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
    Schema::create('GroupMaster', function (Blueprint $table) {
        $table->id('ID'); // IDENTITY(1,1)
        $table->string('GroupName', 255);
        $table->boolean('IsActive')->nullable();
        $table->dateTime('CreatedDate')->nullable();
        $table->integer('CreatedBy')->nullable();
        $table->dateTime('ModifiedDate')->nullable();
        $table->integer('ModifiedBy')->nullable();
        $table->boolean('IsNBGroup')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_master');
    }
};
