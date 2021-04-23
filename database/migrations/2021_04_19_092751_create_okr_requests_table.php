<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOkrRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('okr_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("creator_id");
            $table->foreign("creator_id")->references("id")->on("users")->onDelete('cascade');
            $table->integer("okr_id");
            $table->foreign("okr_id")->references("id")->on("okrs")->onDelete('cascade');
            $table->string("current")->nullable();
            $table->string("amount");
            $table->boolean("is_approved");
            $table->string("pdf_path");
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
        Schema::dropIfExists('okr_requests');
    }
}
