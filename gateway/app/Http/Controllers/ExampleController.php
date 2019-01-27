<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function index()
    {
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Welcome guest to msx-store-box an microserivice example implemented in PHP!',
            'app' => [
                'client' => [
                    'dashboard' => 'https://msx-dashboard.firebaseapp.com',
                    'cashier' => 'https://msx-dashboard.firebaseapp.com',
                    'android_order_source' => 'https://github.com/aasumitro/msx-store-box'
                ],
                'api' => [
                    'prefix' => 'api',
                    'version' => 'v1',
                    'available' => [
                        'authors' => [
                            'params' => [
                                'key' => 'with',
                                'value' => 'product',
                                'use' => 'url?with=product',
                                'effect' => 'HTTP METHOD GET'
                            ],
                            'GET' => 'https://msx-gateway.herokuapp.com/api/v1/authors',
                            'GET ' => 'https://msx-gateway.herokuapp.com/api/v1/authors/{id}',
                            'POST' => 'https://msx-gateway.herokuapp.com/api/v1/authors',
                            'PUT' => 'https://msx-gateway.herokuapp.com/api/v1/authors/{id}',
                            'DELETE' => 'https://msx-gateway.herokuapp.com/api/v1/authors/{id}',
                        ],
                        'categories' => [
                            'params' => [
                                'key' => 'with',
                                'value' => 'product',
                                'use' => 'url?with=product',
                                'effect' => 'HTTP METHOD GET'
                            ],
                            'GET' => 'https://msx-gateway.herokuapp.com/api/v1/categories',
                            'GET ' => 'https://msx-gateway.herokuapp.com/api/v1/categories/{id}',
                            'POST' => 'https://msx-gateway.herokuapp.com/api/v1/categories',
                            'PUT' => 'https://msx-gateway.herokuapp.com/api/v1/categories/{id}',
                            'DELETE' => 'https://msx-gateway.herokuapp.com/api/v1/categories/{id}',
                        ],
                        'products' => [
                            'params' => [
                                'key' => 'detail',
                                'value' => 'true',
                                'use' => 'url?detail=true',
                                'effect' => 'HTTP METHOD GET'
                            ],
                            'GET' => 'https://msx-gateway.herokuapp.com/api/v1/products',
                            'GET ' => 'https://msx-gateway.herokuapp.com/api/v1/products/{id}',
                            'POST' => 'https://msx-gateway.herokuapp.com/api/v1/products',
                            'PUT' => 'https://msx-gateway.herokuapp.com/api/v1/products/{id}',
                            'DELETE' => 'https://msx-gateway.herokuapp.com/api/v1/products/{id}',
                        ],
                        'orders' => [
                            'params' => [
                                'sort' => [
                                    'key' => 'sort',
                                    'value' => [
                                        'asc',
                                        'desc'
                                    ],
                                    'use' => [
                                        'url?sort=asc',
                                        'url?sort=desc'
                                    ],

                                ],
                                'filter' => [
                                    'key' => 'filter',
                                    'value' => [
                                        'date',
                                        'trans',
                                        'refs'
                                    ],
                                    'use' => [
                                        'url?filter=date',
                                        'url?filter=trans',
                                        'url?filter=refs',
                                    ]

                                ],
                                'key' => [
                                    'key' => 'key',
                                    'value' => [
                                        'trans_id',
                                        'date',
                                        'refs_id'
                                    ],
                                    'use' => [
                                        'url?key=trans_id',
                                        'url?key=date',
                                        'url?key=refs_id',
                                    ]

                                ],
                                'effect' => 'HTTP METHOD GET'
                            ],
                            'GET' => 'https://msx-gateway.herokuapp.com/api/v1/orders/{id}',
                            'POST' => 'https://msx-gateway.herokuapp.com/api/v1/orders',
                        ],
                        'account' => [

                        ],
                    ],
                ],

            ],
            'author' => [
                'name' => 'A. A. Sumitro',
                'email' => 'aasumitro@merahputih.com',
                'site' => 'https://aasumitro.id',
            ],
            'project' => [
                'name' => 'msx-store-box',
                'description' => 'Microservice implementation in PHP lang with Slim3 fr and Lumen Fr',
                'source' => 'https://github.com/aasumitro/msx-store-box'
            ]
        ]);
    }
}
