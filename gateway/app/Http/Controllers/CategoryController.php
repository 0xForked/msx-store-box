<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Traits\ApiResponser;

use App\Services\ProductService;

class CategoryController extends Controller
{
    use ApiResponser;

    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function list(Request $request)
    {
        $with = $request->get('with');
        if ($with == "product") {
            return $this->successResponse($this->productService->obtainCategoriesWithProduct());
        }
        return $this->successResponse($this->productService->obtainCategories());
    }

    public function detail(Request $request, $id)
    {
        $with = $request->get('with');
        if ($with == "true") {
            return $this->successResponse($this->productService->obtainCategoryWithProduct($id));
        }
        return $this->successResponse($this->productService->obtainCategory($id));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->successResponse($this->productService->createCategory($data, Response::HTTP_CREATED));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->successResponse($this->productService->editCategory($data, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->productService->deleteCategory($id));
    }

}