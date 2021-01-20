<?php

declare(strict_types=1);

namespace App\Util;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerUtil
{
    protected $serializer;

    public function __construct()
    {
        $enconders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $enconders);
    }

    public function deserialize($data,string $type,string $format, array $context=[]){
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    public function serialize($data, string $format, array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }
}