<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_oder', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_user");
            $table->double('total_cart', 15, 8);
            $table->string("tax");
            $table->double('total', 15, 8);
            $table->string("description")->nullable();
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
        Schema::dropIfExists('tbl_oder');
    }
}
