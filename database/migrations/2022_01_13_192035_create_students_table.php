<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('nic');
            $table->date('dob');
            $table->integer('contactNo');
            $table->string('gender');
            $table->string('email');
            $table->unsignedBigInteger('batch_id')->default(0);
            $table->timestamps();
            $table->foreign('batch_id')
                ->references('id')
                ->on('batches')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
