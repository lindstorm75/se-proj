<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->string("full_name");
            $table->integer("head_id");
            $table->foreign("head_id")->references('id')->on('heads')->onDelete('cascade');
            $table->string("position");
            $table->integer("department_id");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete('cascade');
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
        Schema::dropIfExists('subordinates');
    }
}
