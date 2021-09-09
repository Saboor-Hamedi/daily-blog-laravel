<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
   
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('lastname')->nullable();
            $table->date('dob')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
             $table->foreignId('user_id')->constrained()->nullable()->onDelete('cascade');
            $table->timestamps();
            // $table->bigInteger('user_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')
            // ->nullable()->onDelete('cascade');
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
