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
            $table->string("type");
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('birth')->nullable();
            $table->string('city');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('via')->nullable();
            $table->string('CAP')->nullable();
            $table->string('comune')->nullable();
            $table->string('regione')->nullable();
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
