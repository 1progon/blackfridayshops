<?php

use App\Shop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnumColumnAdmStatusInShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->enum('adm_status', ['active', 'disabled'])->default('active');
        });

        DB::table('shops')
            ->whereIn('id', [57, 578, 580, 336, 347, 110, 624, 698, 450, 502, 294])
            ->update(['adm_status' => 'disabled']);

        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('adm_status_string');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->string('adm_status_string')->default('active');
            $table->dropColumn('adm_status');
        });

        DB::table('shops')
            ->whereIn('id', [57, 578, 580, 336, 347, 110, 624, 698, 450, 502, 294])
            ->update(['adm_status_string' => 'disabled']);
    }
}
