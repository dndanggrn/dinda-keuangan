<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uang_keluar', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('keterangan')->nullable(); // ✅ ubah jadi nullable
            $table->decimal('jumlah', 15, 2);
            $table->string('kategori')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uang_keluar');
    }
};
