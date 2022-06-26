<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('name');
            $table->string('unit');
            $table->string('department');
            $table->string('item_code');
            $table->float('tax_rate');
            $table->foreignId('inventory_category_id')->constrained();
            $table->boolean('active_inventory')->default(true);
            $table->float('normalized_servings_per_unit');
            $table->string('normalized_serving_unit');
            $table->float('inventory_count_per_unit');
            $table->string('inventory_count_unit');
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
        Schema::dropIfExists('goods');
    }
}
