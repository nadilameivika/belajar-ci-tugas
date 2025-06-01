<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $product;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
    }

    public function index(): string
    {
        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_home', $data);
    }
    public function faq()
{
    return view('layouts/header') 
        . view('v_home/v_faq') 
        . view('layouts/footer');
}

public function contact()
{
    return view('layouts/header') 
        . view('v_home/v_contact') 
        . view('layouts/footer');
}

}
