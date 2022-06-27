<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeGoodsFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->float('normalized_servings_per_unit')->nullable()->change();
            $table->string('normalized_serving_unit')->nullable()->change();
            $table->float('inventory_count_per_unit')->nullable()->change();
            $table->string('inventory_count_unit')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->float('normalized_servings_per_unit')->nullable(false)->change();
            $table->string('normalized_serving_unit')->nullable(false)->change();
            $table->float('inventory_count_per_unit')->nullable(false)->change();
            $table->string('inventory_count_unit')->nullable(false)->change();
        });
    }
}
