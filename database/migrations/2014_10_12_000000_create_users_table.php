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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_num')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('password');
            $table->boolean('isVerified')->default(false);
//            $table->enum('gender', [1, 2])->comment('1=>male, 1=>female');
            $table->string('photo')->nullable();
            $table->bigInteger('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            //$table->unsignedBigInteger('classroom_id')->nullable();
            //$table->unsignedBigInteger('school_id')->nullable();
            //$table->string('address')->nullable();
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
