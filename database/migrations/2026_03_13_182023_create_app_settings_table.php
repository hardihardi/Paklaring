<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('app_settings')) {
            Schema::create('app_settings', function (Blueprint $table) {
                $table->id();
                $table->string('company_name');
                $table->string('company_email')->nullable();
                $table->string('company_phone')->nullable();
                $table->text('company_address')->nullable();
                $table->string('company_logo')->nullable();
                $table->string('favicon')->nullable();
                $table->string('app_name')->nullable();
                $table->string('letter_location')->nullable();
                $table->string('signature_image')->nullable();
                $table->string('company_stamp')->nullable();
                $table->string('signer_name')->nullable();
                $table->string('signer_position')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
