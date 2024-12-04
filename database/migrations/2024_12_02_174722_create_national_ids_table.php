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
        Schema::create('national_ids', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('national_id');
            $table->string('expiry_date');
            $table->foreignIdFor(\App\Models\User::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('national_ids');
    }
};
