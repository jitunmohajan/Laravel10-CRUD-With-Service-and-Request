<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\StoreValidateRequest;
use App\Http\Requests\UpdateValidateRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index(){
        $product = $this->productService->getALlProducts();
        return view('products.index',[ 'products' => $product ]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(StoreValidateRequest $request){
        $this->productService->store($request->name, $request->description, $request->image);
        return back()->withSuccess('Product Created!!');
    }
    public function edit($id){
        $product = $this->productService->getSingleProduct($id);
        return view('products.edit',[ 'product' => $product]);
    }
    public function update(UpdateValidateRequest $request, $id){
        $this->productService->update($id,$request->name, $request->description, $request->image);
        return back()->withSuccess('Product Updated!!');
    }
    public function show($id){
        $product = $this->productService->getSingleProduct($id);
        return view('products.show',[ 'product' => $product]);
    }
    public function destroy($id){
        $product = $this->productService->destroy($id);
        return back()->withSuccess('Product Deleted!!');

    }
}
