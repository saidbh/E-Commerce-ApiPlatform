<?php

namespace App\Services;

use Symfony\Component\Serializer\SerializerInterface;

class SerialiserGroupsService
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer    = $serializer;
    }

    public function serialiseWithGroups($object,string $groups)
    {
        $serializedObject = $this->serializer->serialize($object, 'json', ['groups' => $groups]);
       return json_decode($serializedObject, true);
    }

}