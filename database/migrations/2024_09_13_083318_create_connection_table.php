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
        Schema::create('connection', function (Blueprint $table) {
            $table->id();
            $table->string('client_code');
            $table->string('client_name');
            $table->string('proaccounting_database_ip');
            $table->string('proaccounting_database_port');
            $table->string('proaccounting_database_user');
            $table->string('proaccounting_database_password');
            $table->string('proaccounting_database_name');
            $table->string('prohukum_database_ip');
            $table->string('prohukum_database_port');
            $table->string('prohukum_database_user');
            $table->string('prohukum_database_password');
            $table->string('prohukum_database_name');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connection');
    }
};
