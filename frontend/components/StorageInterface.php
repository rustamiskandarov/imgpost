<?php
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 05.04.2018
 * Time: 13:56
 */
namespace frontend\modules\user\components;

use yii\web\UploadedFile;


/**
 * Interface StorageInterface
 * @package frontend\modules\user\components
 */
interface StorageInterface
{
    public function saveUploadedFile(UploadedFile $file);

    public function getFile(string $filename);
}