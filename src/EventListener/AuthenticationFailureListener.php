<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {
        $response = new JsonResponse();

        $JsonResponse = $response->setData([
            "header" => [
                "code" => 400,
                "message" => "Authentication Failed !",
            ],
            "response" => null
        ]);

        $event->setResponse($JsonResponse);
    }

}