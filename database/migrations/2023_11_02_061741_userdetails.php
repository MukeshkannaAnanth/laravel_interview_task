<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->timestamps(); // Created at and Updated at timestamps
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
