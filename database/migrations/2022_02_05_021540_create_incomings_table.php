<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('title');
            $table->string('letter_number');
            $table->date('letter_date');
            $table->string('from');
            $table->text('detail');
            $table->text('letter');
            $table->integer('id_type')->unsigned();
            $table->integer('id_admin')->unsigned();
            $table->integer('id_headmaster')->unsigned()->nullable();
            $table->integer('status')->default(0);
            $table->integer('status_teacher')->default(0);
            $table->timestamps();
        });
        Schema::table('incomings', function (Blueprint $table) {
            $table->foreign('id_type', 'id_type_incomings_fk_01')->references('id')->on('incoming_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_admin', 'id_admin_incomings_fk_02')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_headmaster', 'id_headmaster_incomings_fk_04')->references('id')->on('headmasters')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomings');
    }
}
