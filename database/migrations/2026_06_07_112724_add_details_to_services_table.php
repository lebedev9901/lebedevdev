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
        Schema::table('services', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->json('advantages')->nullable()->after('description');
            $table->json('stages')->nullable()->after('advantages');

            $table->string('meta_title')->nullable()->after('sort_order');
            $table->text('meta_description')->nullable()->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
             $table->dropColumn([
                'subtitle',
                'advantages',
                'stages',
                'meta_title',
                'meta_description',
            ]);
        });
    }
};
