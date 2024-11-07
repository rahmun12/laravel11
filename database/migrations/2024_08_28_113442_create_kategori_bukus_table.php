<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_bukus', function (Blueprint $table) {
            $table->id();  // Kolom 'id' sebagai primary key
            $table->string('nama_kategori');  // Kolom untuk nama kategori buku
            $table->text('deskripsi')->nullable();  // Kolom untuk deskripsi, nullable berarti kolom ini tidak wajib diisi
            $table->timestamps();  // Kolom 'created_at' dan 'updated_at' yang otomatis dikelola oleh Laravel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_bukus');
    }
}
