<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('uang_keluar', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('uang_keluar', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};
