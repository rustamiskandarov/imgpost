<?php
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 12.04.2018
 * Time: 17:54
 */

namespace frontend\components;


use yii\base\Event;
use yii\base\Component;
use frontend\models\Feed;

class FeedService extends Component
{
    public function addToFeeds($event)
    {
        $user = $event->getUser();
        $post = $event->getPost();

        $followers = $user->getFollowers();

        foreach ($followers as $follower){
            $feedItem = new Feed();
            $feedItem->user_id = $follower['id'];
            $feedItem->author_id = $user->id;
            $feedItem->author_name = $user->username;
            $feedItem->author_nickname = $user->getNickname();
            $feedItem->author_picture = $user->getPicture();
            $feedItem->post_id = $post->id;
            $feedItem->post_filename = $post->filename;
            $feedItem->post_description = $post->description;
            $feedItem->post_created_at = $post->created_at;
            $feedItem->save();

        }
    }
}