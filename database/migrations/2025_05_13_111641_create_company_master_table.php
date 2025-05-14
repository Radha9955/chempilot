<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMasterTable extends Migration
{
    public function up()
    {
        Schema::create('CompanyMaster', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName', 255);
            $table->string('AddressLine1', 255)->nullable();
            $table->string('AddressLine2', 255)->nullable();
            $table->string('AddressLine3', 255)->nullable();
            $table->integer('CityID')->nullable();
            $table->string('PinCode', 8)->nullable();
            $table->string('Phone', 64)->nullable();
            $table->string('MobilePhone', 64)->nullable();
            $table->string('WhatsAppNo', 64)->nullable();
            $table->string('Email', 64)->nullable();
            $table->string('TIN', 15)->nullable();
            $table->string('GST', 15)->nullable();
            $table->string('Logo', 1024)->nullable();
            $table->string('Website', 255)->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->integer('ModifiedBy')->nullable();
            $table->string('CompanyCode', 5)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('CompanyMaster');
    }
}
