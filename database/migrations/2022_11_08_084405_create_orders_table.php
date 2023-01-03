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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id');
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('city', 100);
            $table->string('neighbourhood', 100);
            $table->string('district', 100);
            $table->string('zipcode', 100);
            $table->string('email', 50);
            $table->string('address', 200);
            $table->string('phone', 20);
            $table->float('total');
            $table->string('note', 150)->nullable();
            $table->string('IP', 20);
            $table->string('status', 30)->default('New');
            $table->string('is_pay', 5)->default('False')->nullable();
            $table->string('payment', 60);
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
        Schema::dropIfExists('orders');
    }
};
