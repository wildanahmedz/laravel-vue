<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('channel_id')->nullable();
            $table->uuid('product_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->string('item_options');
            $table->date('moved_to_cart')->nullable();
            $table->integer('shared');
            $table->date('time_of_moving')->nullable();
            $table->timestamps();
            $table->primary('id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            //
        });
    }
}
