<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemMasterTable extends Migration
{
    public function up(): void
    {
        Schema::create('item_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->decimal('from_price', 18, 2)->nullable();
            $table->decimal('to_price', 18, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_date')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamp('modified_date')->nullable();
            $table->string('modified_by')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('item_code')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_master');
    }
}
