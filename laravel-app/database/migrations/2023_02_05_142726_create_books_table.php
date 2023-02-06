<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover');
            $table->string('description');
            $table->float('price');
            $table->unsignedBigInteger('authors_id');
            $table->unsignedBigInteger('genres_id');
            $table->BigInteger('stock');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('authors_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('genres_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}