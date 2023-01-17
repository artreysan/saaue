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
            $table->boolean('account_gitlab')->nullable();
            $table->boolean('account_jira')->nullable();
            $table->boolean('account_glpi')->nullable();
            $table->boolean('account_da')->nullable();

            $table->boolean('internet')->nullable();
            $table->boolean('vpn')->nullable();
            $table->boolean('ip')->nullable();
            $table->boolean('nodo')->nullable();

            $table->boolean('access_project')->nullable();

            //Status de la solicitud basada en 4 digitos
            // 0 = pendiente
            // 1 = en proceso
            // 2 = atendida
            // 3 = validada
            $table->char('status', 1);

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

            $table->char('project1', 100)->nullable();
            $table->char('project2', 100)->nullable();
            $table->char('project3', 100)->nullable();

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
