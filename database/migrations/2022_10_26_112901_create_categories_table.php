<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('parent_id')->default(0);
            $table->integer('main_cat_id')->nullable();
            $table->string('title_tr',200)->nullable();
            $table->string('keywords_tr')->nullable();
            $table->string('description_tr')->nullable();
            $table->text('detail_tr')->nullable();
            $table->string('title_en',200)->nullable();
            $table->string('keywords_en')->nullable();
            $table->string('description_en')->nullable();
            $table->text('detail_en')->nullable();
            $table->string('image',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
            $table->string('title',150);
            $table->string('keywords');
            $table->text('detail');
            $table->string('description');
            $table->timestamps(); //create created_at, uptaded_at fields
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
