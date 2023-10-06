<?php

namespace App\Controller;

use App\Services\ProductService;
use App\tools\paramsHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/list', name: 'app_product', methods: 'GET')]
    public function listProduct(ProductService $productService)
    {
        return $productService->getListProduct();
    }

    #[Route('/product/create', name: 'app_product_create', methods: 'POST')]
    public function createProduct(Request $request,ProductService $productService,paramsHelper $paramsHelper)
    {
        $paramsHelper->setInputs($request->request->all());
        return $productService->createProduct();
    }

    #[Route('/product/update', name: 'app_product_update', methods: 'PUT')]
    public function updateProduct(Request $request,ProductService $productService,paramsHelper $paramsHelper)
    {
        $paramsHelper->setInputs($request->request->all());
        return $productService->updateProduct();
    }

    #[Route('/product/delete/{id}', name: 'app_product_delete', methods: 'PUT')]
    public function deleteProduct(Request $request,ProductService $productService,paramsHelper $paramsHelper)
    {
        $paramsHelper->setInputs($request->request->all());
        return $productService->deleteProduct();
    }
}
