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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('packing_cost')->nullable();
            $table->dropColumn('is_completed');
            $table->timestamp('completed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('weight');
            $table->dropColumn('packing_cost');
            $table->boolean('is_completed')->default(false);
            $table->dropColumn('completed_at');
        });
    }
};
