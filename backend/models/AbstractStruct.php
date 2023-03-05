<?php
declare(strict_types=1);

namespace app\models;

use app\shop\product\struct\ProductStruct;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

abstract class AbstractStruct
{
    /**
     * @throws NotValidatedFields|ExceptionInterface
     */
    public static function byForm(IForm $form): static
    {
        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PhpDocExtractor();
        $propertyExtractor = new PropertyInfoExtractor([$reflectionExtractor], [$phpDocExtractor, $reflectionExtractor], [$phpDocExtractor], [$reflectionExtractor], [$reflectionExtractor]);
        $normalizer = new ObjectNormalizer(null, null, null, $propertyExtractor);
        $arrayNormalizer = new ArrayDenormalizer();
        $serializer = new Serializer([$arrayNormalizer, $normalizer]);
        $struct = $serializer->denormalize(
            $form->validatedFields(),
            static::class
        );
        return $struct;
    }
}