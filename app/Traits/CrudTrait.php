<?php
namespace App\Traits;

trait CrudTrait{
    public function list($model){
        $DB = '\App\\'.$model;
        return $DB::all();
    }
}
