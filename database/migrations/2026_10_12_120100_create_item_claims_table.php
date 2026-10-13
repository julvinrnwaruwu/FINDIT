<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_report_id')->constrained('item_reports')->cascadeOnDelete();
            $table->foreignId('claimant_id')->constrained('users')->cascadeOnDelete();
            $table->text('message');
            $table->string('status', 20)->default('pending');
            $table->timestamps();
            $table->index(['item_report_id', 'claimant_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_claims');
    }
};
