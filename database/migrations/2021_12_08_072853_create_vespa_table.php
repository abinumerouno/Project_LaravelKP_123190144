<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVespaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //protected $table = 'vespa';
    public function up()
    {
        Schema::create('vespas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_vespa')->unique();
            $table->string('tahun');
            $table->text('kondisi');
            $table->string('harga');
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
        Schema::dropIfExists('vespas');
    }
}
