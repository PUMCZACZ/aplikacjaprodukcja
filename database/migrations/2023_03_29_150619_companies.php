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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_company');
            $table->string('tag');
            $table->integer('phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('name_of_company');
            $table->dropColumn('tag');
            $table->dropColumn('phone');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
