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
        if (!Schema::hasTable('letters')) {
            Schema::create('letters', function (Blueprint $table) {
                $table->id();
                $table->foreignId('letter_type_id');
                $table->string('letter_perihal');
                $table->json('recipients');
                $table->text('content');
                $table->string('attachment')->nullable();
                $table->foreignId('notulis');
                $table->timestamps();
            });
        }
    }
    
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
    
};