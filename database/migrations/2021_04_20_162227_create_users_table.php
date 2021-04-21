<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer("department_id");
            $table->foreign("department_id")->references("id")->on("departments");
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->integer('role_id');
            $table->foreign("role_id")->references("id")->on("roles");
            $table->integer("head_id")->nullable();
            $table->foreign("head_id")->references("id")->on("users");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
