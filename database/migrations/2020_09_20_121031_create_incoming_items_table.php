<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id');
            $table->dateTime('process_date');
            $table->bigInteger('ppn');
            $table->bigInteger('price');
            $table->string('description');
            $table->foreignId('created_by');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_items', function (Blueprint $table) {
            $table->dropForeign('incoming_items_supplier_id_foreign');
            $table->dropForeign('incoming_items_created_by_foreign');
        });
    }
}
