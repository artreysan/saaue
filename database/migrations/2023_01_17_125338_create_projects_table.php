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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->char('full_name', 150);
            $table->char('short_name', 150);
            $table->char('acronym', 45);
            $table->char('unit', 150);

            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
            ->references('id')
                ->on('levels');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('collaborator_id');
            $table->foreign('collaborator_id')
                ->references('id')
                ->on('collaborators');

            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->foreign('equipment_id')
                ->references('id')
                ->on('equipment');

            $table->unsignedBigInteger('database_id')->nullable();
            $table->foreign('database_id')
            ->references('id')
                ->on('databases');

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
        Schema::dropIfExists('projects');
    }
};
