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
        //Throws an exception when creating a club, surname is null (?)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("");
            $table->string('surname')->default("");
            $table->string('birth')->default("00/00/00");
            $table->string('city');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('via')->default("");
            $table->string('CAP')->default("");
            $table->string('comune')->default("");
            $table->string('regione')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
