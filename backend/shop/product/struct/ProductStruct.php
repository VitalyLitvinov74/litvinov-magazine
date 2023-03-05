<?php
declare(strict_types=1);

namespace app\shop\product\struct;

use app\models\AbstractStruct;
use app\models\TypeStruct;
use app\shop\product\Product;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

final class ProductStruct extends AbstractStruct
{

    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $shortDescription,
        /**@var EquipmentStruct[] $equipments*/
        public readonly array $equipments = [],
    )
    {
    }
}