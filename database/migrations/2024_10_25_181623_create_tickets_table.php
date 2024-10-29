<?php

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('agent_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->enum('status', TicketStatus::values())->default(TicketStatus::OPEN->value);
            $table->enum('priority', TicketPriority::values())->default(TicketPriority::LOW->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
