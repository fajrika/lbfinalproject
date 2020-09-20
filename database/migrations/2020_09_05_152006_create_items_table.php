<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('slug name');
            $table->string('name');
            $table->foreignId('category_id');
            $table->bigInteger('price');
            $table->bigInteger('stock');
            $table->foreignId('created_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items', function (Blueprint $table) {
            $table->dropForeign('items_created_by_foreign');
            $table->dropForeign('items_category_id_foreign');
        });
    }
}
