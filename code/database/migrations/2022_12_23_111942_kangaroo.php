<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kangaroo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kangaroos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('nickname');
            $table->float('weight');
            $table->float('height');
            $table->string('gender');
            $table->string('color')->nullable();
            $table->string('friendliness')->nullable();
            $table->timestamp('birthday');
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
        //
    }
}
