<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lansia_desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('rt_rw_desa_id')->constrained('rt_rw_desas')->onDelete('cascade');
            $table->integer('tahun');
            $table->enum('jenis_lansia', ['jumlah_lansia']);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->enum('status', ['Arsip', 'Pending', 'Approved', 'Rejected'])->default('Arsip');
            $table->text('reject_reason')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lansia_desas');
    }
};
