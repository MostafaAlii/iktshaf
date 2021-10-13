<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTapPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tap_payments', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('UserName')->nullable();
            $table->string('Password')->nullable();
            $table->string('api_key')->nullable();
            $table->string('Authorization');  
            $table->string('currency');                            
            $table->enum('live' , ['live' , 'test']);
            $table->enum('statue' , ['open' , 'closed']);
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
        Schema::dropIfExists('tap_payments');
    }
}
