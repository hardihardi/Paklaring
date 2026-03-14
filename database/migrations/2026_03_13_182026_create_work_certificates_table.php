<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('work_certificates')) {
            Schema::create('work_certificates', function (Blueprint $table) {
                $table->id();
                $table->foreignId('employee_id')->constrained()->onDelete('cascade');
                $table->string('certificate_number')->unique();
                $table->date('issued_date');
                $table->date('end_date')->nullable();
                $table->text('content')->nullable();
                $table->string('qr_code_path')->nullable();
                $table->string('pdf_path')->nullable();
                $table->foreignId('created_by')->constrained('users');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('work_certificates');
    }
};
