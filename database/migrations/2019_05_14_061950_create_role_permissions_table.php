<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_role_id');
            $table->foreign('fk_role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('fk_module_id');
            $table->foreign('fk_module_id')->references('id')->on('modules');
            $table->unsignedBigInteger('fk_sub_module_id');
            $table->foreign('fk_sub_module_id')->references('id')->on('sub_modules');
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
        Schema::dropIfExists('role_permissions');
    }
}
