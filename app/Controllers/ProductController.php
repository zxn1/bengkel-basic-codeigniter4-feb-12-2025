<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $result = $productModel->findAll();

        return view('product/index', ['products' => $result]);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric'
        ];

        if(! $this->validate($rules))
        {
            //return json_encode(['status' => 'fail', 'message' => $this->validator->getErrors()]);
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $productModel = new ProductModel();
        
        if($productModel->insert($this->request->getPost()))
        {
            return redirect()->route('/')->with('success', 'Product created successfully.');
        }
    }

    public function show($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        return view('product/show', ['product' => $product]);
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        return view('product/edit', ['product' => $product]);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric'
        ];

        if(! $this->validate($rules))
        {
            //return json_encode(['status' => 'fail', 'message' => $this->validator->getErrors()]);
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $productModel = new ProductModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ];
        
        if($productModel->update($id, $data))
        {
            return redirect()->route('/')->with('success', 'Product updated successfully.');
        }
    }
}
