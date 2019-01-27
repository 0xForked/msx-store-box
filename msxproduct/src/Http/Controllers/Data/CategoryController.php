<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Entities\Category;

class CategoryController extends Controller
{

    public function store($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['title'];
        $desc = $all_post_vars['desc'];

        $slug = snake_case($title).'_'.random_string(5);

        if (is_null($title) || is_null($desc)) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid entities parsed)',
                'results' => []
            ], 400);
        }

        $data = [
            'title' => $title,
            'desc' => $desc,
            'slug' => $title ?: $slug
        ];

        $category = Category::create($data);

        if (!$category) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid entities parsed)',
                'results' => []
            ], 400);
        }

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Create Category) has succeeded',
            'results' => []
        ], 201);
    }

    // update must use x-www-form-urlencoded
    public function update($request, $response,  $args)
    {
        $id = $args['id'];

        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['title'];
        $desc = $all_post_vars['desc'];

        $slug = snake_case($title).'_'.random_string(5);

        $category = Category::findOrFail($id);

        $data = [
            'title' => $title ?: $category->title,
            'desc' => $desc ?: $category->desc,
            'slug' => ($title == $category->title) ? $category->slug : $slug
        ];

        $category->fill($data);

        if ($category->isClean()) {
            return $response->withJson([
                'code' => 422,
                'status' => 'HTTP_UNPROCESSABLE_ENTITY',
                'message' => 'At least one value must change',
                'resultss' => []
            ], 422);
        }

        $category->save();

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Update Category) has succeeded',
            'results' => []
        ], 201);

    }

    public function destroy($request, $response, $args)
    {
        $id = $args['id'];

        $category = Category::findOrFail($id);

        $category->delete();

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Delete Category) has succeeded',
            'results' => []
        ], 201);
    }

    public function list($request, $response)
    {
        $with = $request->getParam('with');

        if ($with == 'product'):
            $category = Category::with('product')->get();
        else:
            $category = Category::all();
        endif;

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Category list has been fetched',
            'results' => $category
        ];

        return $response->withJson($data, $data['code']);
    }

    public function detail($request, $response, $args)
    {
        $id = $args['id'];
        $with = $request->getParam('with');

        if ($with == 'product'):
            $category = Category::with('product')->findOrFail($id);
        else:
            $category = Category::findOrFail($id);
        endif;

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Category detail has been fetched',
            'results' => $category
        ];

        return $response->withJson($data, $data['code']);
    }


}