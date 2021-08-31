<?php

namespace App\Controllers;

class CategoriesController extends BaseController
{
    public function index(){
        $data = [];
        $this->bladeResponse($data, 'products/categories');
    }
    public function edit($id){

    }
    public function delete($id){

    }
    public function create(){

    }
}