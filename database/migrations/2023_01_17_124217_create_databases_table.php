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
        Schema::create('databases', function (Blueprint $table) {
            $table->id();
            $table->char('name', 150);
            $table->char('short_name', 30)->nullable();
            $table->char('dbms', 200);
            $table->char('so', 20)->nullable();
            $table->char('criticality', 20);

            $table->unsignedBigInteger('level_id')
                ->nullable();
            $table->foreign('level_id')
                ->references('id')
                ->on('levels');

            $table->char('enviroment', 20);
            $table->ipAddress('ip', 20);
            $table->char('port', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('databases');
    }
};
