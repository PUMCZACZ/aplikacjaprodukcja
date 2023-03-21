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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name_of_company');
            $table->string('type_of_product');
            $table->timestamp('delivered_at');
            $table->unsignedInteger('product_amount');
            $table->double('product_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('name_of_company');
            $table->dropColumn('type_of_product');
            $table->dropColumn('delivered_at');
            $table->dropColumn('product_amount');
            $table->dropColumn('product_price');
        });
    }
};
