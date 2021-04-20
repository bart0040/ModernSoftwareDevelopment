<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('junctions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filter_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('junctions');
    }
}
