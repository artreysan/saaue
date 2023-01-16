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
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 150);
            $table->char('apellido_paterno', 150);
            $table->char('apellido_materno', 150)->nullable();
            $table->string('email')->unique();

            //informacion de los servicios
            $table->char('nodo',10)->nullable();

            $table->boolean('internet')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->boolean('vpn')->nullable();

            //informacion de las cuentas de acceso
            $table->char('account_gitlab', 50)->nullable();
            $table->char('account_jira', 50)->nullable();
            $table->char('account_glpi', 50)->nullable();
            $table->char('account_da', 50)->nullable();

            //Llaves foraneas
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rols');

            $table->unsignedBigInteger('enterprise_id');
            $table->foreign('enterprise_id')
                  ->references('id')
                  ->on('enterprises');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators');
    }
};
