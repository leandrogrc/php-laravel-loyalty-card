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
        Schema::create('loyalty_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('establishment_id')->constrained('establishments')->onDelete('cascade');
            $table->integer('paid_visits')->default(0);
            $table->integer('total_visits_required')->default(9);
            $table->integer('rewards_to_claim')->default(0);
            $table->integer('rewards_claimed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyalty_cards');
    }
};
