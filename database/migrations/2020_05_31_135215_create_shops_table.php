<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'shops',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();

                $table->unsignedBigInteger('category_id');

                $table->string('name');
                $table->string('slug');

                $table->string('logo');
                $table->text('description');
                $table->string('website');


                $table->boolean('popular')->default(0);

                $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
