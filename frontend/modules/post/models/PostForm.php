<?php

namespace frontend\modules\post\models;
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 07.04.2018
 * Time: 19:55
 */
use Intervention\Image\ImageManager;
use Yii;
use yii\base\Model;
use frontend\models\Post;
use frontend\models\User;
use frontend\models\events\PostCreatedEvent;

class PostForm extends Model
{
    const MAX_DESCRIPTION_LENGHT = 1000;
    const EVENT_POST_CREATED = 'post_created';

    public $picture;
    public $description;
    private $user;

    public function rules()
    {
        return[
          [['picture'], 'file',
              'skipOnEmpty' => true,
              'extensions' => ['jpg', 'png'],
              'checkExtensionByMimeType' => true,
              'maxSize' => $this->getMaxFileSize()],
            [['description'], 'string', 'max' => self::MAX_DESCRIPTION_LENGHT],
        ];
    }

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->on(self::EVENT_AFTER_VALIDATE, [$this, 'resizePicture']);
        $this->on(self::EVENT_POST_CREATED, [Yii::$app->feedService, 'addToFeeds']);
    }

    public function resizePicture()
    {
        $width = Yii::$app->params['postPicture']['maxWidth'];
        $height = Yii::$app->params['postPicture']['maxWidth'];
        $manager = new ImageManager(array('driver'=>'imagick'));
        $image = $manager->make($this->picture->tempName);
        $image->resize($width, $height, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save();
    }

    public function save(){
        if ($this->validate()){
            $post = new Post();
            $post->description = $this->description;
            $post->created_at = time();
            $post->filename = Yii::$app->storage->saveUploadedFile($this->picture);
            $post->user_id = $this->user->getId();
            if ($post->save(false)){
                $event = new PostCreatedEvent();
                $event->user = $this->user;
                $event->post = $post;
                $this->trigger(self::EVENT_POST_CREATED, $event);
                return true;
            }
        }
        return false;
    }

    private function getMaxFileSize(){
        return Yii::$app->params['maxFileSize'];
    }
}