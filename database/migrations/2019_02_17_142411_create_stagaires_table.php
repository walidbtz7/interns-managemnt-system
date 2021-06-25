<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cin',10)->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email',100);
            $table->string('etablisement');
            $table->string('dateDebut');
            $table->string('dateFin');
            $table->string('statut')->default('attendre');
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->string('motivation')->nullable();
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
        Schema::dropIfExists('stagaires');
    }
}
