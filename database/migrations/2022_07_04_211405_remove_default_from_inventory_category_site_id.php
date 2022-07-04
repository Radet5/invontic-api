<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDefaultFromInventoryCategorySiteId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id')->nullable(false)->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id')->nullable(false)->default(1)->change();
        });
    }
}
