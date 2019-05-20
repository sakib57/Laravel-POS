<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_company_id');
            $table->foreign('fk_company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('fk_created_by');
            $table->foreign('fk_created_by')->references('id')->on('users');
            $table->unsignedBigInteger('fk_updated_by');
            $table->foreign('fk_updated_by')->references('id')->on('users');
            $table->date('quotation_date');
            $table->string('quotation_reference');
            $table->unsignedBigInteger('fk_supplier_id');
            $table->foreign('fk_supplier_id')->references('id')->on('suppliers');
            $table->text('invoice_note');
            $table->text('internal_note');
            $table->decimal('sub_total');
            $table->decimal('discount');
            $table->decimal('product_tax');
            $table->decimal('invoice_tax');
            $table->decimal('shipping_fee');
            $table->decimal('total');
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
        Schema::dropIfExists('quotations');
    }
}
