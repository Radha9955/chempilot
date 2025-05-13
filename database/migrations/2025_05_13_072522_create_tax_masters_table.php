<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxMastersTable extends Migration
{
    public function up()
    {
        Schema::create('taxmasters', function (Blueprint $table) {
            $table->id();
            $table->string('TaxName', 255);
            $table->decimal('CGST', 10, 2)->nullable();
            $table->decimal('SGST', 10, 2)->nullable();
            $table->decimal('IGST', 10, 2)->nullable();
            $table->decimal('CESS', 10, 2)->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->unsignedBigInteger('ModifiedBy')->nullable();
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns automatically

        });
    }

    public function down()
    {
        Schema::dropIfExists('taxmasters');
    }
}

