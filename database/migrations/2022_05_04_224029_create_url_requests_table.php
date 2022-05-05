<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('url_id');
            $table->string('code');
            $table->longText('body');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url_requests');
    }
}
