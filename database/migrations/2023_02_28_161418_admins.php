<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('netto_price')->nullable();
            $table->integer('brutto_price')->nullable();
            $table->integer('bag_price')->nullable();
            $table->integer('bigbag_price')->nullable();
            $table->integer('loose_price')->nullable();
            $table->integer('bag_packing_cost_price')->nullable();
            $table->integer('bigbag_packing_cost_price')->nullable();
            $table->integer('loose_packing_cost_price')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
