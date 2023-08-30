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
        /*Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('gender');
            $table->integer('active');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });*/
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',12);
            $table->string('nom_cto',3);
            $table->string('password',70);
            $table->string('nombre_lar',30);
            $table->string('puesto',45);
            $table->string('email')->nulleable();
            $table->string('cia_ventas',3);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('active');
            $table->softDeletes();
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
