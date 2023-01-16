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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->char('tipo', 20);
            $table->char('marca', 20);
            $table->char('modelo', 20);
            $table->ipAddress('serie', 20);
            $table->macAddress('mac_ethernet', 20);
            $table->macAddress('mac_wifi')->nullable();

            $table->unsignedBigInteger('enterprise_id')->nullable();
            $table->foreign('enterprise_id')
                ->references('id')
                ->on('enterprises');

            $table->unsignedBigInteger('collaborator_id')
                ->unique()
                ->nullable();
            $table->foreign('collaborator_id')
                ->references('id')
                ->on('collaborators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};
