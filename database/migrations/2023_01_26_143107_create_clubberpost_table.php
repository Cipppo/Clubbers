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
        Schema::create('postClubber', function (Blueprint $table) {
            $table->id();
            $table->string("caption");
            $table->string('eventId');
            $table->string("clubberUsername");
            $table->string("clubUsername");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubberpost');
    }
};
