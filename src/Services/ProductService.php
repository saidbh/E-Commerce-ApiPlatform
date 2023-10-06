<?php

namespace App\Services;

use App\Entity\Product;
use App\tools\paramsHelper;
use Doctrine\ORM\EntityManagerInterface;

class ProductService
{
    private $entityManager;
    private $responseService;
    private  $serialiserGroupsService;
    private  $paramsHelper;

    public function __construct(EntityManagerInterface $entityManager, ResponseService $responseService, SerialiserGroupsService $serialiserGroupsService, paramsHelper $paramsHelper)
    {
        $this->entityManager = $entityManager;
        $this->responseService = $responseService;
        $this->serialiserGroupsService    = $serialiserGroupsService;
        $this->paramsHelper    = $paramsHelper;
    }

    public function getListProduct()
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();
        $productslist = $this->serialiserGroupsService->serialiseWithGroups($products,"product");
        return $this->responseService->getResponseToClient(array('data' => $productslist));
    }

    public function createProduct()
    {
        try {
            $inputs = $this->paramsHelper->getInputs();

            $product = new Product();
            $product->setName($inputs['name']);
            $product->setIdentification('#'.$inputs['idproduct']);
            $product->setCreatedAt(new \DateTime("now"));

            $this->entityManager->persist($product);
            $this->entityManager->flush();

            return $this->responseService->getResponseToClient();

        }catch (\Exception $exception)
        {
            return $this->responseService->getResponseToClient(null ,500,"Erreur d enregistrement des donnees !");
        }
    }

    public function updateProduct()
    {
        try {
            $inputs = $this->paramsHelper->getInputs();

            $product = $this->entityManager->getRepository(Product::class)->findOneBy($inputs['id']);
            $product->setName($inputs['name']);
            $product->setIdentification('#'.$inputs['idproduct']);
            $product->setUpdatedAt(new \DateTime("now"));

            $this->entityManager->persist($product);
            $this->entityManager->flush();

            return $this->responseService->getResponseToClient();

        }catch (\Exception $exception)
        {
            return $this->responseService->getResponseToClient(null ,500,"Erreur de mise a jour des donnees !");
        }
    }

    public function deleteProduct()
    {
        try {
            $inputs = $this->paramsHelper->getInputs();
            $product = $this->entityManager->getRepository(Product::class)->findOneBy($inputs['id']);
            $this->entityManager->remove($product);
            $this->entityManager->flush();

            return $this->responseService->getResponseToClient();

        }catch (\Exception $exception)
        {
            return $this->responseService->getResponseToClient(null ,500,"Erreur de suppression des donnees !");
        }
    }

}