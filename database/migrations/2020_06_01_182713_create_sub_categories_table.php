<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sub_categories',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();

                $table->unsignedBigInteger('category_id');

                $table->unsignedBigInteger('admitad_id')->nullable();

                $table->string('name');
                $table->text('description')->nullable();
                $table->string('logo')->nullable();
                $table->string('slug');

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
        Schema::dropIfExists('sub_categories');
    }
}
