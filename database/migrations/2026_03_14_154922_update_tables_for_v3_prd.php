<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            if (!Schema::hasColumn('employees', 'joined_date')) {
                $table->date('joined_date')->nullable();
            }
            if (!Schema::hasColumn('employees', 'employment_status')) {
                $table->enum('employment_status', ['PKWT', 'PKWTT', 'Internship'])->default('PKWT');
            }
        });

        Schema::table('work_certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('work_certificates', 'end_date')) {
                $table->date('end_date')->nullable();
            }
            if (!Schema::hasColumn('work_certificates', 'content')) {
                $table->text('content')->nullable();
            }
        });

        Schema::table('app_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('app_settings', 'favicon')) {
                $table->string('favicon')->nullable();
            }
            if (!Schema::hasColumn('app_settings', 'app_name')) {
                $table->string('app_name')->nullable();
            }
            if (!Schema::hasColumn('app_settings', 'letter_location')) {
                $table->string('letter_location')->nullable();
            }
            if (!Schema::hasColumn('app_settings', 'signer_name')) {
                $table->string('signer_name')->nullable();
            }
            if (!Schema::hasColumn('app_settings', 'signer_position')) {
                $table->string('signer_position')->nullable();
            }
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
