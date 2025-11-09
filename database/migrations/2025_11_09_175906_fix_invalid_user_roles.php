<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Perbaiki user yang memiliki role tidak valid (misalnya 'user')
        // menjadi 'mahasiswa' (default role)
        DB::table('users')
            ->whereNotIn('role', ['admin', 'mahasiswa', 'dosen', 'staff'])
            ->update(['role' => 'mahasiswa']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak ada rollback yang diperlukan
        // Data yang sudah diperbaiki tetap menggunakan role yang valid
    }
};
