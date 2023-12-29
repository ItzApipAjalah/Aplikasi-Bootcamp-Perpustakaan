<?php

// In a migration file (e.g., 2023_01_01_create_peminjamans_table.php)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->integer('stok_tersisa');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}

