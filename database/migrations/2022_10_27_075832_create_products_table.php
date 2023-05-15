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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title_tr',150);
            $table->string('keywords_tr');
            $table->text('detail_tr');
            $table->string('description_tr');
            $table->string('title_en',150);
            $table->string('keywords_en');
            $table->text('detail_en');
            $table->string('description_en');
            $table->string('image',75)->nullable();
            $table->integer('category_id')->nullable();
            $table->decimal('price',20, 2)->default(0)->nullable();
            $table->decimal('sale_price',20, 2)->default(0)->nullable();
            $table->float('sale')->nullable();
            $table->string('is_sale',3)->nullable()->default('No');
            $table->integer('quantity')->default(1);
            $table->integer('minquantity')->default(5);
            $table->integer('tax')->default(10);
            $table->integer('main_category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
            $table->string('title',150);
            $table->string('keywords');
            $table->text('detail');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
