<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_nickname');
            $table->string('site_email')->unique()->nullable();
            
            $table->string('site_icon')->nullable();
            $table->string('site_logo')->nullable();

            $table->longText('site_description')->nullable();
            $table->longText('site_keywords')->nullable();
            $table->longText('site_mentanance_msg')->nullable();

            $table->unsignedBigInteger('like_count')->default(0);
            $table->unsignedBigInteger('share_count')->default(0);
            $table->unsignedBigInteger('comment_count')->default(0);

            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instgram_link')->nullable();
            $table->text('whatsapp_link')->nullable();
            $table->text('linkedIn_link')->nullable();

            $table->enum('site_status', [0, 1])->default(1);
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
        Schema::dropIfExists('settings');
    }
}
