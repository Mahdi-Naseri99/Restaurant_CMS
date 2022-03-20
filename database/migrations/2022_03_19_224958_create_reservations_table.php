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
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('clients_id');
            $table->unsignedBigInteger('tables_id');
            $table->timestamps();

            $table->index('clients_id');
            $table->index('tables_id');

            $table->foreign('clients_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

            $table->foreign('tables_id')
                ->references('id')
                ->on('tables')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
?>
