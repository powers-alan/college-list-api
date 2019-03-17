<?php
namespace App\Infrastructure\Http\Rest\Controller;
use App\Application\Service\ProductService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class ProductsController
 * @package App\Infrastructure\Http\Rest\Controller
 */
final class ProductsController extends FOSRestController
{
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * Retrieves an Product resource
     * @Rest\Get("/products/{productId}")
     * @param int $productId
     * @return View
     */
    public function getProduct(int $productId): View
    {
        $product = $this->productService->getProduct($productId);
        // In case our GET was a success we need to return a 200 HTTP OK response with the request object
        return View::create($product, Response::HTTP_OK);
    }
    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/products")
     * @return View
     */
    public function getProducts(): View
    {
        $products = $this->productService->getAllProducts();
        // In case our GET was a success we need to return a 200 HTTP OK response with the collection of product object
        return View::create($products, Response::HTTP_OK);
    }
    /**
     * Replaces Product resource
     * @Rest\Put("/products/{productId}")
     * @param int $productId
     * @param Request $request
     * @return View
     */
    public function putProduct(int $productId, Request $request): View
    {
        $product = $this->productService->updateProduct($productId, $request->get('title'), $request->get('content'));
        // In case our PUT was a success we need to return a 200 HTTP OK response with the object as a result of PUT
        return View::create($product, Response::HTTP_OK);
    }
    /**
     * Removes the Product resource
     * @Rest\Delete("/products/{productId}")
     * @param int $productId
     * @return View
     */
    public function deleteProduct(int $productId): View
    {
        $this->productService->deleteProduct($productId);
        // In case our DELETE was a success we need to return a 204 HTTP NO CONTENT response. The object is deleted.
        return View::create([], Response::HTTP_NO_CONTENT);
    }
}