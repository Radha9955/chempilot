<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsnmasterTable extends Migration
{
    public function up()
    {
        Schema::create('HSNMaster', function (Blueprint $table) {
            $table->id();
            $table->string('HSNName', 255);
            $table->integer('GSTID')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->integer('ModifiedBy')->nullable();
            $table->timestamps();

            $table->primary('ID');
        });
    }

    public function down()
    {
        Schema::dropIfExists('HSNMaster');
    }
}
