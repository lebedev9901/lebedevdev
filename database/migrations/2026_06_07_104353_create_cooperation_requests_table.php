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
        Schema::create('cooperation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');

            $table->string('site_type')->nullable();
            $table->string('design')->nullable();
            $table->json('features')->nullable();

            $table->string('budget')->nullable();
            $table->string('deadline')->nullable();
            $table->string('examples')->nullable();

            $table->text('description');

            $table->string('status')->default('new');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperation_requests');
    }
};
