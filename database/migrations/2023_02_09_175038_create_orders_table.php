<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('quantity');
            $table->unsignedDouble('price');
            $table->boolean('is_completed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('client_id');
            $table->dropColumn('quantity');
            $table->dropColumn('price');
            $table->dropColumn('is_completed');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
