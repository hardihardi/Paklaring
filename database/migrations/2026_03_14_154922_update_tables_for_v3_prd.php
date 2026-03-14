<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->date('joined_date')->nullable();
            $table->enum('employment_status', ['PKWT', 'PKWTT', 'Internship'])->default('PKWT');
        });

        Schema::table('work_certificates', function (Blueprint $table) {
            $table->date('end_date')->nullable();
            $table->text('content')->nullable();
        });

        Schema::table('app_settings', function (Blueprint $table) {
            $table->string('favicon')->nullable();
            $table->string('app_name')->nullable();
            $table->string('letter_location')->nullable();
            $table->string('signer_name')->nullable();
            $table->string('signer_position')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['joined_date', 'employment_status']);
        });

        Schema::table('work_certificates', function (Blueprint $table) {
            $table->dropColumn(['end_date', 'content']);
        });

        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropColumn(['favicon', 'app_name', 'letter_location', 'signer_name', 'signer_position']);
        });
    }
};
