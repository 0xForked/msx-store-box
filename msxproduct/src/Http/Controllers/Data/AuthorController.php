<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Entities\Author;

use App\Traits\ApiResponser;

class AuthorController extends Controller
{

    public function store($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $thumbnail = $all_post_vars['thumbnail'];
        $fullname = $all_post_vars['fullname'];
        $email = $all_post_vars['email'];
        $birth = $all_post_vars['birth'];

        $unique_id = random_string(16);

        if (is_null($fullname) || is_null($email)) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid data)',
                'results' => []
            ], 400);
        }

        $data = [
            'unique_id' => $unique_id,
            'thumbnail' => $thumbnail,
            'fullname' => $fullname,
            'email' => $email,
            'birth' => $birth
        ];

        $author = Author::create($data);

        if (!$author) {
            return $response->withJson([
                'code' => 400,
                'status' => 'BAD_REQUEST',
                'message' => 'The request cannot be completed (invalid data)',
                'results' => []
            ], 400);
        }

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Create Author) has succeeded',
            'results' => []
        ], 201);

    }

    // update must use x-www-form-urlencoded
    public function update($request, $response,  $args)
    {
        $id = $args['id'];

        $all_post_vars = $request->getParsedBody();
        $thumbnail = $all_post_vars['thumbnail'];
        $fullname = $all_post_vars['fullname'];
        $email = $all_post_vars['email'];
        $birth = $all_post_vars['birth'];

        $author = Author::findOrFail($id);

        $data = [
            'thumbnail' => $thumbnail ?: $author->thumbnail,
            'fullname' => $fullname ?: $author->fullname,
            'email' => $email ?: $author->email,
            'birth' => $birth ?: $author->birth
        ];

        $author->fill($data);

        if ($author->isClean()) {
            return $response->withJson([
                'code' => 422,
                'status' => 'HTTP_UNPROCESSABLE_ENTITY',
                'message' => 'At least one value must change',
                'results' => []
            ], 422);
        }

        $author->save();

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Update Author) has succeeded',
            'results' => []
        ], 201);

    }

    public function destroy($request, $response, $args)
    {
        $id = $args['id'];

        $author = Author::findOrFail($id);

        $author->delete();

        return $response->withJson([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'The request (Delete Author) has succeeded',
            'results' => []
        ], 201);

    }

    public function list($request, $response)
    {
        $with = $request->getParam('with');

        if ($with == 'product'):
            $authors = Author::with('product')->get();
        else:
            $authors = Author::all();
        endif;

        $raw = [];

        foreach ($authors as $author) {

            // if ($author.isEmpty()) {
            //     continue;
            // }

            $raw[] = [
                'id' => $author->id,
                'unique_id' => $author['unique_id'],
                'thumbnail' => $author['thumbnail'],
                'fullname' => $author['fullname'],
                'email' => $author['email'],
                'birth' => json_decode($author['birth'])
            ];
        }

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Author list has been fetched',
            'results' => $raw
        ];

        return $response->withJson($data, $data['code']);

    }

    public function detail($request, $response, $args)
    {
        $id = $args['id'];
        $with = $request->getParam('with');

        if ($with == 'product'):
            $author = Author::with('product')->findOrFail($id);
        else:
            $author = Author::findOrFail($id);
        endif;

        $raw = [];

        if ($author) {
            $raw[] = [
                'id' => $author->id,
                'unique_id' => $author->unique_id,
                'thumbnail' => $author->thumbnail,
                'fullname' => $author->fullname,
                'email' => $author->email,
                'birth' => json_decode($author->birth)
            ];
        }

        $data = [
            'code' => 200,
            'status' => 'OK',
            'message' => 'Author detail has been fetched',
            'results' => $raw
        ];

        return $response->withJson($data, $data['code']);
    }

}