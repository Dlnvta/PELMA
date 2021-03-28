<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_pengaduan');
            $table->string('judul_pengaduan');
            $table->text('isi_pengaduan');
            $table->string('lokasi');
            $table->string('detail_lokasi');
            $table->string('foto');
            $table->enum('status', ['pending','proses', 'selesai']);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pengaduans', function($table) {
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('pengaduans');
    }
}
