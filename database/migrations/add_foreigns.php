<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->foreign('role_id')->references('id')->on('dict_role')->onDelete('cascade');
        });

        Schema::table('delivery', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_created_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('delivery_has_product', function (Blueprint $table) {
            $table->foreign('delivery_id')->references('id')->on('delivery')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('product_category')->onDelete('cascade');
        });

        Schema::table('waste', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_created_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('waste_has_product', function (Blueprint $table) {
            $table->foreign('waste_id')->references('id')->on('waste')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropForeign('users_role_id_foreign');
        });

        Schema::table('delivery', function (Blueprint $table) {
            $table->dropForeign('delivery_city_id_foreign');
            $table->dropForeign('delivery_user_created_id_foreign');
        });

        Schema::table('delivery_has_product', function (Blueprint $table) {
            $table->dropForeign('delivery_has_product_delivery_id_foreign');
            $table->dropForeign('delivery_has_product_product_id_foreign');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_category_id_foreign');
        });

        Schema::table('waste', function (Blueprint $table) {
            $table->dropForeign('waste_city_id_foreign');
            $table->dropForeign('waste_user_created_id_foreign');
        });

        Schema::table('waste_has_product', function (Blueprint $table) {
            $table->dropForeign('waste_has_product_product_id_foreign');
            $table->dropForeign('waste_has_product_waste_id_foreign');
        });
    }
};
