<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_company_id');
            $table->foreign('fk_company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('fk_created_by');
            $table->foreign('fk_created_by')->references('id')->on('users');
            $table->unsignedBigInteger('fk_updated_by');
            $table->foreign('fk_updated_by')->references('id')->on('users');
            $table->string('product_code')->unique();
            $table->string('product_name')->unique();
            $table->unsignedBigInteger('fk_category_id');
            $table->foreign('fk_category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('fk_sub_category_id');
            $table->foreign('fk_sub_category_id')->references('id')->on('categories');
            $table->decimal('product_unit', 10, 2)->default('0');
            $table->decimal('product_size', 10, 2)->default('0');
            $table->decimal('product_cost', 10, 2)->default('0');
            $table->decimal('product_price', 10, 2)->default('0');
            $table->integer('product_alert_quantity')->default('0');
            $table->string('product_reference');
            $table->unsignedBigInteger('fk_warehouse_id');
            $table->foreign('fk_warehouse_id')->references('id')->on('warehouses');
            $table->unsignedBigInteger('fk_biller_id');
            $table->foreign('fk_biller_id')->references('id')->on('billers');
            $table->unsignedBigInteger('fk_customer_id');
            $table->foreign('fk_customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('fk_product_tax');
            $table->foreign('fk_product_tax')->references('id')->on('tax_rates');
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
        Schema::dropIfExists('products');
    }
}

