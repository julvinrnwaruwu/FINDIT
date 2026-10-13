<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('item_reports', 'whatsapp')) {
            Schema::table('item_reports', function (Blueprint $table) {
                $table->string('whatsapp', 20)->nullable();
            });
        }
        if (!Schema::hasColumn('item_reports', 'whatsapp_consent_at')) {
            Schema::table('item_reports', function (Blueprint $table) {
                $table->timestamp('whatsapp_consent_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Sengaja tidak menghapus kolom untuk menjaga data kontak yang mungkin sudah tersimpan.
    }
};
