<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('users');
            
            /** TODO
             * Utilizado para ahorrar consultas
             * Necesario cambiarse.
             */
            $table->text('last_message')->nullable();
            $table->date('last_time')->nullable();

            $table->boolean('listen_notifications')->default(true);
            $table->boolean('has_blocked')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
