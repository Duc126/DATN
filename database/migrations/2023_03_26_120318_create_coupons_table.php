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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('coupon_option');
            $table->string('coupon_code');
            $table->text('categories');
            $table->text('brands');
            $table->text('users');
            $table->string('coupon_type')->nullable();
            $table->string('amount_type')->nullable();
            $table->float('amount',12, 2)->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('coupons');
    }
};
