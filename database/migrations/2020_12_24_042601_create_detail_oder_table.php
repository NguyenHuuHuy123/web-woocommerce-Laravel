<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_oder', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("product_id");
            $table->double('product_price', 15, 8);
            $table->integer("quantity");
            $table->double('total', 15, 8);
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
        Schema::dropIfExists('tbl_detail_oder');
    }
}
