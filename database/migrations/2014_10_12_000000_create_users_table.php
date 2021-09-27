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
            $table->id();
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name',20);
            $table->string('first_name',10)->nullable();
            $table->string('last_name',10)->nullable();
            $table->string('password',20);
            $table->boolean('active_status')->default(1);
            $table->integer('access_level');
            $table->string('image_path',100)->nullable();
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
