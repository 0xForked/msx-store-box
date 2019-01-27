<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Traits\ApiResponser;

use App\Services\ProductService;

class ProductController extends Controller
{
    use ApiResponser;

    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function list(Request $request)
    {
        $detail = $request->get('detail');
        if ($detail == "true") {
            return $this->successResponse($this->productService->obtainProductsWithDetail());
        }
        return $this->successResponse($this->productService->obtainProducts());
    }

    public function detail(Request $request, $id)
    {
        $detail = $request->get('detail');
        if ($detail == "true") {
            return $this->successResponse($this->productService->obtainProductWithDetail($id));
        }
        return $this->successResponse($this->productService->obtainProduct($id));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->successResponse($this->productService->createProduct($data, Response::HTTP_CREATED));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->successResponse($this->productService->editProduct($data, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->productService->deleteProduct($id));
    }

}