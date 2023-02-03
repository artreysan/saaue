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
        Schema::create('petitions', function (Blueprint $table) {
            $table->id();

            //booleanos para confirmar peticiones si se requiere
            //este bloque es para responder a la peticion sobre las cuentas solicitadas
            // el "a" anteriror a al nombre de la variable para la cuenta significa "answering" Ejemplo. a_account_gitlab
            $table->boolean('account_gitlab')->nullable();
            $table->char('a_account_gitlab', 30)->nullable();

            $table->boolean('account_jira')->nullable();
            $table->char('a_account_jira', 30)->nullable();

            $table->boolean('account_glpi')->nullable();
            $table->char('a_account_glpi', 30)->nullable();

            $table->boolean('account_da', 30)->nullable();
            $table->char('a_account_da', 30)->nullable();

            $table->boolean('internet', 30)->nullable();
            $table->char('a_internet', 30)->nullable();

            $table->boolean('vpn')->nullable();
            $table->ipAddress('a_vpn', 30)->nullable();

            $table->boolean('ip')->nullable();
            $table->ipAddress('a_ip', 30)->nullable();

            $table->boolean('nodo')->nullable();
            $table->char('a_nodo')->nullable();

            //Status de la solicitud basada en 4 digitos
            // 0 = pendiente
            // 1 = en proceso
            // 2 = atendida
            // 3 = validada

            $table->char('status', 1);


            //Este bloque es para almacenar los tickets requeridos para responder a la solicitud
            $table->char('tk_glpi_account_1', 30)->nullable();
            $table->char('tk_gitlab_account_1', 30)->nullable();
            $table->char('tk_jira_account_1', 30)->nullable();
            $table->char('tk_da_account_1', 30)->nullable();

            $table->char('tk_glpi_account_0', 30)->nullable();
            $table->char('tk_gitlab_account_0', 30)->nullable();
            $table->char('tk_jira_account_0', 30)->nullable();
            $table->char('tk_da_account_0', 30)->nullable();

            $table->char('tk_nodo_1', 30)->nullable();
            $table->char('tk_internet_1', 30)->nullable();
            $table->char('tk_ip_1', 30)->nullable();
            $table->char('tk_vpn_1', 30)->nullable();

            $table->char('tk_nodo_0', 30)->nullable();
            $table->char('tk_internet_0', 30)->nullable();
            $table->char('tk_ip_0', 30)->nullable();
            $table->char('tk_vpn_0', 30)->nullable();

            $table->boolean('access_project')->nullable();

            $table->char('project1', 100)->nullable();
            $table->char('project2', 100)->nullable();
            $table->char('project3', 100)->nullable();

            // los siguientes datos son llaves foraneas para detallar los datos de la peticion
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->foreign('equipment_id')
                ->references('id')
                ->on('equipment');

            $table->unsignedBigInteger('collaborator_id');
            $table->foreign('collaborator_id')
                ->references('id')
                ->on('collaborators');

            // el fileID es un dato generado por la fecha  y un valor aleatorio para obteer un folio unico de la peticion
            $table->string('fileID')->nullable()->unique();

            $table->unsignedInteger('startTime')->nullable();
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
        Schema::dropIfExists('petitions');
    }
};
