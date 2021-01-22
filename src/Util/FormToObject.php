<?php

declare(strict_types=1);

namespace App\Util;

use Exception;
use ReflectionClass;
use ReflectionException;

class FormToObject
{
    static public function createClass(array $request,object $classInstance) : object
    {
        try{
            $reflector = new ReflectionClass($classInstance);
            $properties = $reflector->getProperties();
    

            foreach ($properties as $value) {
                $property = $reflector->getProperty($value->name);
                $property->setAccessible(true);
                
                if (isset($request[$value->name])) {
                    $property->setValue($classInstance, $request[$value->name]);
                }
      
            } 
            return $classInstance;

        } catch (ReflectionException $exception) {
            throw new Exception($exception->getMessage());
        }
        
    }
} 