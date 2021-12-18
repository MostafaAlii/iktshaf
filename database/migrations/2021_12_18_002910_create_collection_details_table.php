<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_details', function (Blueprint $table) {
            $table->id();
            $table->text('professions');
            $table->text('specialization');
            $table->foreignId('collection_id')->constrained('collections')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('pattern_id')->constrained('patterns')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('collection_details');
    }
}
