<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryRecapRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_recap_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('good_id')->constrained();
            $table->float('count');
            $table->foreignId('inventory_recap_id')->constrained();
            $table->float('tax_rate');
            $table->float('count_per_unit');
            $table->string('count_unit');
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
        Schema::dropIfExists('inventory_recap_records');
    }
}
