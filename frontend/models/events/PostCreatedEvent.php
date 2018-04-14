<?php
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 12.04.2018
 * Time: 18:17
 */

namespace frontend\models\events;

use yii\base\Event;
use frontend\models\User;
use frontend\models\Post;

class PostCreatedEvent extends Event
{
    public $user;

    public $post;

    public function getUser(): User
    {
        return $this->user;
    }

    public function getPost() : Post
    {
        return $this->post;
    }
}

