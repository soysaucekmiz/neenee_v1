<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('item_name', 25)->change(); //追記
            $table->string('item_comment', 30)->change(); //追記
            $table->string('item_description', 1000)->change(); //追記
            $table->string('item_cov_img')->nullable()->change(); // 追記
            $table->string('item_img2')->nullable()->change(); // 追記
            $table->string('item_img3')->nullable()->change(); // 追記
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}
