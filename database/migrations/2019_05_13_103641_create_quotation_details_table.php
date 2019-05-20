<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_company_id');
            $table->foreign('fk_company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('fk_created_by');
            $table->foreign('fk_created_by')->references('id')->on('users');
            $table->unsignedBigInteger('fk_updated_by');
            $table->foreign('fk_updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('fk_quotation_id');
            $table->foreign('fk_quotation_id')->references('id')->on('quotations');
            $table->unsignedBigInteger('fk_product_id');
            $table->foreign('fk_product_id')->references('id')->on('products');
            $table->unsignedBigInteger('fk_tax_id');
            $table->foreign('fk_tax_id')->references('id')->on('tax_rates');
            $table->integer('quantity')->default('0');
            $table->decimal('unit_price', 10, 2)->default('0');
            $table->decimal('sub_total', 10, 2)->default('0');
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
        Schema::dropIfExists('quotation_details');
    }
}
