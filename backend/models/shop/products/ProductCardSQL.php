<?php


namespace app\models\shop\products;


use app\models\shop\products\contracts\IProduct;
use app\models\shop\products\contracts\IProductCard;
use app\models\contracts\IMedia;
use app\tables\TableProductCards;
use phpDocumentor\Reflection\Types\Self_;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;

class ProductCardSQL implements IProductCard
{
    private $orign;
    private $id;

    public function __construct(IField $id, IProductCard $productCard)
    {
        $this->id = $id;
        $this->orign = $productCard;
    }

    public function byRecord(TableProductCards $record):self{
        return new self(
            new Field('id', $record->id),
            new ProductCard(
                new Field('title', $record->title),
                new Field('shortDescription', $record->short_description),
                new Field('description', $record->description)
            )
        );
    }

    public static function byId(IField $id){
        $record = TableProductCards::find()->where(['id'=>$id->value()])->one();
        if($record){
            return self::byRecord($record);
        }
        throw new NotFoundEntity("Не удалось найти карточку продукта");
    }


    public function printTo(IMedia $media): IMedia
    {
        return $this->orign
            ->printTo($media)
            ->add('id', $this->id->value())
            ;
    }

    public function changeTitle(IForm $form): IProductCard
    {
        $this->orign->changeTitle($form);
        $newTitle = $form->validatedFields()['title'];
        $record = $this->record();
        $record->title = $newTitle;
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function changeDescriptions(IForm $form): IProductCard
    {
        $this->orign->changeDescriptions($form);
        $fields = $form->validatedFields();
        $newDesc =$fields['description'];
        $shortDesc = $fields['shortDescription'];
        $record = $this->record();
        $record->description = $newDesc;
        $record->short_description = $shortDesc;
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function remove(): void
    {
        $this->orign->remove();
        $this->record()->delete();
    }

    private function record(): TableProductCards{
        return new TableProductCards([
            'id'=>$this->id->value(),
            'isNewRecord' => false
        ]);
    }
}