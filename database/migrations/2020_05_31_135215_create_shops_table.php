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

                $table->string('name');
                $table->boolean('popular')->default(0);
                $table->string('slug');

                $table->unsignedBigInteger('adm_id');
                $table->string('adm_image');
                $table->string('adm_status');
                $table->string('adm_connection_status');
                $table->dateTime('adm_modified_date');
                $table->string('adm_gotolink');

                $table->text('description')->nullable();
                $table->string('website')->nullable();



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
