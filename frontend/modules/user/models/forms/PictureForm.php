<?php
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 05.04.2018
 * Time: 8:30
 */

namespace frontend\modules\user\models\forms;


use yii\base\Model;

class PictureForm extends Model
{
    public $picture;
    public function rules()
    {
        return [
            [['picture'], 'file',
                'extensions' => ['jpg'],
                'checkExtensionByMimeType' => true
            ],
        ];
    }

    public function save(){
        return 1;
    }
}