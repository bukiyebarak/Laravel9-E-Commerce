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
        Schema::create('neighbourhood', function (Blueprint $table) {
            $table->id('mahalle_id');
            $table->string('mahalle_title');
            $table->integer('mahalle_key');
            $table->integer('mahalle_ilcekey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighbourhood');
    }
};
