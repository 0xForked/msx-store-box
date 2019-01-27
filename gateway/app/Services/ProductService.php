<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ProductService
{

    use ConsumesExternalService;
    /**
     * The base uri to consume the products service
     * @var string
     */

    public $baseUri;

    /**
     * The secret to consume the products service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.product.base_uri');
        $this->secret = config('services.product.secret');
    }

    /**
     * Obtain the list of product from the product service
     * @return string
     */
    public function obtainProducts()
    {
        return $this->performRequest('GET', '/products');
    }

     /**
     * Obtain the full (with category and author) list of product from the product service
     * @return string
     */
    public function obtainProductsWithDetail()
    {
        return $this->performRequest('GET', '/products?detail=true');
    }

    /**
     * Obtain one single product from the product service
     * @return string
     */
    public function obtainProduct($id)
    {
        return $this->performRequest('GET', "/products/{$id}");
    }


     /**
     * Obtain the full (with category and author) single of product from the product service
     * @return string
     */
    public function obtainProductWithDetail($id)
    {
        return $this->performRequest('GET', "/products/{$id}?detail=true");
    }

    /**
     * Create one product using the product service
     * @return string
     */
    public function createProduct($data)
    {
        return $this->performRequest('POST', '/products', $data);
    }

    /**
     * Update an instance of product using the product service
     * @return string
     */
    public function editProduct($data, $id)
    {
        return $this->performRequest('PUT', "/products/{$id}", $data);
    }

    /**
     * Remove a single product using the product service
     * @return string
     */
    public function deleteProduct($id)
    {
        return $this->performRequest('DELETE', "/products/{$id}");
    }

    /**
     * Obtain the list of author from the product service
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

     /**
     * Obtain the full (with category and author) list of author from the product service
     * @return string
     */
    public function obtainAuthorsWithProduct()
    {
        return $this->performRequest('GET', '/authors?with=product');
    }

    /**
     * Obtain one single author from the product service
     * @return string
     */
    public function obtainAuthor($id)
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

     /**
     * Obtain the full (with product) single of author from the product service
     * @return string
     */
    public function obtainAuthorWithProduct($id)
    {
        return $this->performRequest('GET', "/authors/{$id}?with=product");
    }

    /**
     * Create one author using the product service
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Update an instance of author using the product service
     * @return string
     */
    public function editAuthor($data, $id)
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    /**
     * Remove a single author using the product service
     * @return string
     */
    public function deleteAuthor($id)
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }

    /**
     * Obtain the list of category from the product service
     * @return string
     */
    public function obtainCategories()
    {
        return $this->performRequest('GET', '/categories');
    }

     /**
     * Obtain the full (with product) list of category from the product service
     * @return string
     */
    public function obtainCategoriesWithProduct()
    {
        return $this->performRequest('GET', '/categories?with=product');
    }

    /**
     * Obtain one single category from the product service
     * @return string
     */
    public function obtainCategory($id)
    {
        return $this->performRequest('GET', "/categories/{$id}");
    }

     /**
     * Obtain the full (with product) single of category from the product service
     * @return string
     */
    public function obtainCategoryWithProduct($id)
    {
        return $this->performRequest('GET', "/categories/{$id}?with=product");
    }

    /**
     * Create one category using the product service
     * @return string
     */
    public function createCategory($data)
    {
        return $this->performRequest('POST', '/categories', $data);
    }

    /**
     * Update an instance of category using the product service
     * @return string
     */
    public function editCategory($data, $id)
    {
        return $this->performRequest('PUT', "/categories/{$id}", $data);
    }

    /**
     * Remove a single category using the product service
     * @return string
     */
    public function deleteCategory($id)
    {
        return $this->performRequest('DELETE', "/categories/{$id}");
    }

}