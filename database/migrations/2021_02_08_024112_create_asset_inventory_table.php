<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_asset');
            $table->integer('id_categori');
            $table->integer('id_divisi');
            $table->integer('id_location');
            $table->string('brand');
            $table->string('model');
            $table->string('product_id');
            $table->integer('price');
            $table->date('date_of_purchase');
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
        Schema::dropIfExists('asset_inventory');
    }
}
