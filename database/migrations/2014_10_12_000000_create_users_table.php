<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('telephone')->unique();
            $table->string('adresse');
            $table->string('adresse_complet');
            $table->string('profil');
            $table->string('lat');
            $table->string('lng');
            $table->boolean('etat');
            $table->string('email')->unique();
            $table->boolean('confirmed')->default(0);
            $table->string('token',254)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->longText('photo')->nullable();
            $table->string('sexe')->nullable();
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
