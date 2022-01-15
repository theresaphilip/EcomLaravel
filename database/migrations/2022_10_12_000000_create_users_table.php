<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',32);
            $table->string('lastname',32);
            $table->string('email',320)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',64)->nullable();
            $table->boolean('status');
           // $table->foreignId('role_id')->constrained('roles')->default('5');
           $table->unsignedBigInteger('role_id'); 
           $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
