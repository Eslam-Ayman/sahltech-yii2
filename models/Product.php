<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\Category;

class Product extends ActiveRecord
{
    private $id;
    private $category_id;
    private $title;
    private $description;
    private $image;
    private $color;
    private $price;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['category_id', 'title', 'description', 'price', 'color'], 'required'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['category_id', 'price'], 'integer'],
			// [['category_id'], 'exist', 'targetAttribute' => 'id', 'skipOnEmpty' => false],
        ];

    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('/uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
