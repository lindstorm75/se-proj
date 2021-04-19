<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heads', function (Blueprint $table) {
            $table->increments('id');
            $table->string("full_name");
            $table->string("position");
            $table->integer("department_id");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete('cascade');
            $table->integer("creator_id");
            $table->foreign("creator_id")->references("id")->on("admins");
            $table->string("image")->nullable();
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
        Schema::dropIfExists('heads');
    }
}
