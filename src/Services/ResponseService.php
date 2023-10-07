<?php

namespace App\Services;

use App\Representation\ResponseToClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ResponseService
{
    public function getResponseToClient($response = null, int $code = 200, $message="ok"): JsonResponse
    {
        $response = new ResponseToClient($response, $code, $message);
        $serializer = new Serializer([new ObjectNormalizer()]);
        return new JsonResponse($serializer->normalize($response));
    }

}