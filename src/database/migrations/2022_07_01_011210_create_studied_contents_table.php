<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiedContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studied_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('study_record_id');
            $table->unsignedBigInteger('content_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('study_record_id')
                ->references('id')
                ->on('study_records')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studied_contents');
    }
}
