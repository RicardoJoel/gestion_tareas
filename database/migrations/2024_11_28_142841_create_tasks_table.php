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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('code', 8);
            $table->string('dni', 8);
            $table->string('title', 100);
            $table->string('description', 500);
            $table->date('expired_at')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['code', 'deleted_at']);
            $table->foreign('status_id')
                ->references('id')
                ->on('status')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
