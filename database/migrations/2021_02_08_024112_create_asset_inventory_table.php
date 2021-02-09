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
            $table->integer('id_categori')->unsigned();
            $table->integer('id_divisi')->unsigned();
            $table->integer('id_location')->unsigned();
            $table->string('description');
            $table->string('brand');
            $table->string('model');
            $table->string('product_id');
            $table->integer('price');
            $table->date('date_of_purchase');
            $table->foreign('id_categori')->references('id')->on('asset_categori');
            $table->foreign('id_divisi')->references('id')->on('divisi');
            $table->foreign('id_location')->references('id')->on('office_location');
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
