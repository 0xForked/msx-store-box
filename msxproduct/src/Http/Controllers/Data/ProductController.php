<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Entities\Product;

class ProductController extends Controller
{

    public function store($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $thumbnail = $all_post_vars['thumbnail'];
        $title = $all_post_vars['title'];
        $description = $all_post_vars['description'];
        $language = $all_post_vars['language'];
        $pages = $all_post_vars['pages'];
        $year = $all_post_vars['year'];
        $price = $all_post_vars['price'];
        $publisher = $all_post_vars['publisher'];
        $published_date = $all_post_vars['published_date'];
        $isbns = $all_post_vars['isbns'];
        $category_raw = $all_post_vars['category'];
        $author_raw = $all_post_vars['author'];

        preg_match_all('!\d+!', $category_raw, $category_matches);
        $categories = (is_array($category_raw)) ? $category_raw : $category_matches;

        preg_match_all('!\d+!', $author_raw, $author_matches);
        $authors = (is_array($author_raw)) ? $author_raw : $author_matches;

        $unique_id = random_string(16);

        if (is_null($title) || is_null($year)) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid data)',
                'data' => []
            ], 400);
        }

        $data = [
            'unique_id' => $unique_id,
            'thumbnail' => $thumbnail,
            'title' => $title,
            'description' => $description,
            'language' => $language,
            'pages' => $pages,
            'year' => $year,
            'price' => $price,
            'publisher' => $publisher ,
            'published_date' => $published_date,
            'isbns' => $isbns
        ];

        $product = Product::create($data);

        if (!$product) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid data)',
                'data' => []
            ], 400);
        }

        foreach ($categories as $category) {
            $product->category()->attach($category);
        }

        foreach ($authors as $author) {
            $product->author()->attach($author);
        }

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Create Product) has succeeded',
            'data' => []
        ], 201);

    }

    public function update($request, $response, $args)
    {
        $id = $args['id'];

        $all_post_vars = $request->getParsedBody();
        $thumbnail = $all_post_vars['thumbnail'];
        $title = $all_post_vars['title'];
        $description = $all_post_vars['description'];
        $language = $all_post_vars['language'];
        $pages = $all_post_vars['pages'];
        $year = $all_post_vars['year'];
        $price = $all_post_vars['price'];
        $publisher = $all_post_vars['publisher'];
        $published_date = $all_post_vars['published_date'];
        $isbns = $all_post_vars['isbns'];
        $category_raw = $all_post_vars['category'];
        $author_raw = $all_post_vars['author'];

        preg_match_all('!\d+!', $category_raw, $category_matches);
        $categories = (is_array($category_raw)) ? $category_raw : $category_matches;

        preg_match_all('!\d+!', $author_raw, $author_matches);
        $authors = (is_array($author_raw)) ? $author_raw : $author_matches;

        $product = Product::findOrFail($id);

        $data = [
            'thumbnail' => $thumbnail ?: $product->thumbnail,
            'title' => $title ?: $product->title,
            'description' => $description ?: $product->description,
            'language' => $language ?: $product->language,
            'pages' => $pages ?: $product->pages,
            'year' => $year ?: $product->year,
            'price' => $price ?: $product->price,
            'publisher' => $publisher ?: $product->publisher,
            'published_date' => $published_date ?: $product->published_date,
            'isbns' => $isbns ?: $product->isbns
        ];

        $product->fill($data);

        if ($product->isClean()) {
            return $response->withJson([
                'code' => 422,
                'status' => 'HTTP_UNPROCESSABLE_ENTITY',
                'message' => 'At least one value must change',
                'results' => []
            ], 422);
        }

        $product->save();

        $product = Product::findOrFail($id);

        foreach ($categories as $category) {
            $product->category()->sync($category);
        }

        foreach ($authors as $author) {
            $product->author()->sync($author);
        }

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Update Product) has succeeded',
            'results' => []
        ], 201);

    }

    public function destroy($request, $response, $args)
    {
        $id = $args['id'];

        $product = Product::findOrFail($id);

        $product->delete();

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Delete Product) has succeeded',
            'results' => []
        ], 201);
    }

    public function list($request, $response)
    {
        $detail = $request->getParam('detail');

        if ($detail === "true"):
            $products = Product::with(['author', 'category'])->get();
        else:
            $products = Product::all();
        endif;

        $product_raw = [];

        foreach ($products as $product) {

            $author_raw = [];
            $category_raw = [];

            if ($detail === "true"):
                foreach ($product->author as $author) {
                    $author_raw[] = [
                        'id' => $author->id,
                        'unique_id' => $author->unique_id,
                        'thumbnail' => $author->thumbnail,
                        'fullname' => $author->fullname,
                        'email' => $author->email,
                        'gender' => $author->gender,
                        'birth' => json_decode($author->birth),
                    ];
                }

                foreach ($product->category as $category) {
                    $category_raw[] = [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                        'desc' => $category->desc
                    ];
                }
            endif;

            $product_raw[] = [
                'id' => $product->id,
                'unique_id' => $product->unique_id ,
                'thumbnail' => $product->thumbnail,
                'title' => $product->title,
                'description' => $product->description,
                'language' => $product->language,
                'pages' => $product->pages,
                'year' => $product->year,
                'price' => $product->price,
                'publisher' => $product->publisher,
                'published_date' => $product->published_date,
                'isbns' => json_decode($product->isbns),
                'created_at' => $product->created_at,
                'updated_at' =>  $product->updated_at,
                'author' => $author_raw,
                'category' => $category_raw
            ];
        }

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Author detail has been fetched',
            'results' => $product_raw
        ];

        return $response->withJson($data, 200);
    }

    public function detail($request, $response, $args)
    {
        $id = $args['id'];

        $detail = $request->getParam('detail');

        if ($detail === "true"):
            $product = Product::with(['author', 'category'])->findOrFail($id);
        else:
            $product = Product::findOrFail($id);
        endif;

        $product_raw = [];

        if($product) {
            $author_raw = [];
            $category_raw = [];

            if ($detail === "true"):
                foreach ($product->author as $author) {
                    $author_raw[] = [
                        'id' => $author->id,
                        'unique_id' => $author->unique_id,
                        'thumbnail' => $author->thumbnail,
                        'fullname' => $author->fullname,
                        'email' => $author->email,
                        'gender' => $author->gender,
                        'birth' => json_decode($author->birth),
                    ];
                }

                foreach ($product->category as $category) {
                    $category_raw[] = [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                        'desc' => $category->desc
                    ];
                }
            endif;

            $product_raw[] = [
                'id' => $product->id,
                'unique_id' => $product->unique_id ,
                'thumbnail' => $product->thumbnail,
                'title' => $product->title,
                'description' => $product->description,
                'language' => $product->language,
                'pages' => $product->pages,
                'year' => $product->year,
                'price' => $product->price,
                'publisher' => $product->publisher,
                'published_date' => $product->published_date,
                'isbns' => json_decode($product->isbns),
                'created_at' => $product->created_at,
                'updated_at' =>  $product->updated_at,
                'author' => $author_raw,
                'category' => $category_raw
            ];
        }

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Author detail has been fetched',
            'results' => $product_raw
        ];

        return $response->withJson($data, 200);

    }

}