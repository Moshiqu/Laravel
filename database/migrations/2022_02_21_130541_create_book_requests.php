<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('book_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->string('item_name');
            $table->date('pickup_date');
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
        Schema::dropIfExists('book_requests');
    }
}
