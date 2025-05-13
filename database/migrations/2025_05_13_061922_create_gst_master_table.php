<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstMasterTable extends Migration
{
    public function up()
    {
        Schema::create('GSTMaster', function (Blueprint $table) {
            $table->id();  // Automatically creates 'ID' as the primary key
            $table->string('GSTName', 255);
            $table->integer('GroupID')->nullable();
            $table->decimal('FromAmount', 10, 2)->nullable();
            $table->decimal('ToAmount', 10, 2)->nullable();
            $table->dateTime('FromDate')->nullable();
            $table->dateTime('ToDate')->nullable();
            $table->integer('TaxID')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->integer('ModifiedBy')->nullable();
            
            // Do not add $table->timestamps() to avoid 'created_at' and 'updated_at' columns
            $table->primary('ID');
        });
    }

    public function down()
    {
        Schema::dropIfExists('GSTMaster');
    }
}
