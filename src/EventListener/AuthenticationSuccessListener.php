<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;


class AuthenticationSuccessListener
{
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
         $event->setData([
            'header' => [
                "code" => $event->getResponse()->getStatusCode(),
                "message" => "OK"
            ],
            'response' => [
                'token' => $event->getData()['token'],
            ],
        ]);
    }

}