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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(10);
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('phone',false,false)->nullable(true);
            $table->integer('city_id',false,true)->nullable(true)->lenght(3);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('dict_role', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(10);
            $table->string('role_name')->nullable($value = false);
        });

        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->date('delivery_date')->nullable(false);
            $table->integer('user_created_id')->nullable(false)->unsigned()->lenght(10);
            $table->integer('city_id',false,true)->nullable(false)->lenght(3);
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(3);
            $table->string('city_name',15);
            $table->timestamps();
        });

        Schema::create('delivery_has_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('delivery_id',false,true);
            $table->integer('product_id',false,true)->lenght(10);
            $table->integer('pieses');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(10);
            $table->string('product_name',15)->nullable(false);
            $table->integer('category_id',false,true)->lenght(5);
            $table->float('price',3,2);
            $table->timestamps();
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(5);
            $table->string('category_name')->nullable(false);
            $table->timestamps();
        });

        Schema::create('waste', function (Blueprint $table) {
            $table->id();
            $table->date('waste_date')->nullable(false);
            $table->integer('id_produktu')->nullable(false);
            $table->integer('pieces')->nullable(false);
            $table->integer('user_created_id')->nullable(false)->unsigned()->lenght(10);
            $table->integer('city_id',false,true)->nullable(false)->lenght(3);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id',false,true);
        });

        Schema::create('orders_location', function (Blueprint $table) {
            $table->integer('id',true,true)->lenght(5);
            $table->string('name',20);
        });

        Schema::create('order_has_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id',false,true);
            $table->integer('product_id',false,true)->lenght(10);
            $table->integer('pieses');
        });
        
        Schema::create('exchange', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id_seller',false,true);
            $table->bigInteger('user_id_buyer',false,true);
            $table->integer('product_id',false,true)->lenght(10);
            $table->integer('pieses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('dict_role');
        Schema::dropIfExists('delivery');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('delivery_has_product');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('waste');
        Schema::dropIfExists('waste_has_product');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_location');
        Schema::dropIfExists('order_has_product');
        Schema::dropIfExists('exchange');
    }
};
