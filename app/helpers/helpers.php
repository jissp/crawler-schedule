<?php
if (!function_exists('objectToArray')) {
    function objectToArray(object $object): array
    {
        return json_decode(json_encode($object, JSON_UNESCAPED_UNICODE), JSON_OBJECT_AS_ARRAY);
    }
}

if (!function_exists('DtoMapper')) {
    /**
     * @param string $dtoClass
     * @param object | array $object
     * @return object|null
     */

    /**
     * @param string $dtoClass
     * @param object|array $object
     * @return object|null
     */
    function DtoMapper(string $dtoClass, object|array $object): object|null
    {
        try {
            if (!class_exists($dtoClass)) {
                return null;
            }

            // Dto 클래스를 Reflection Class를 이용해서 생성 후 Property를 세팅해준다.
            $reflectionClass = new ReflectionClass($dtoClass);

            /** @var object $dto */
            $dto = $reflectionClass->newInstanceWithoutConstructor();

            foreach ($reflectionClass->getProperties() as $property) {
                $propertyName = $property->getName();
                if (isset($object[$propertyName])) {
                    $property->setValue($dto, $object[$propertyName]);
                }
            }

            // DTO 객체 반환
            return $dto;
        } catch (ReflectionException $e) {
            return null;
        }
    }
}
