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
        Schema::table('transports', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->unsignedInteger('product_price')->change()->nullable();
            $table->string('tag')->nullable();
            $table->timestamp('completed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->string('slug');
            $table->dropColumn('product_price');
            $table->dropColumn('tag');
            $table->dropColumn('completed_at');
        });
    }
};
