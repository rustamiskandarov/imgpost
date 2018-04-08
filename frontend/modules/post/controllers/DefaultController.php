<?php

namespace frontend\modules\post\controllers;

use frontend\models\User;
use Yii;
use yii\web\Controller;
use frontend\modules\post\models\PostForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use frontend\models\Post;


/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate()
    {
        $model = new PostForm(Yii::$app->user->identity);

        if ($model->load(Yii::$app->request->post())){

            $model->picture = UploadedFile::getInstance($model, 'picture');

            if($model->save()){

                Yii::$app->session->setFlash('success', 'Post created');
                return $this->goHome();
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id){
        $currentUser = Yii::$app->user->identity;
        return $this->render('view',[
            'post' => $this->findPost($id),
            'currentUser' => $currentUser,
        ]);
    }

    /**
     * @param $id
     * @return User
     * @throws NotFoundHttpException
     */
    public function findPost($id){
        if($user = Post::findOne($id)){
            return $user;
        }
        throw new NotFoundHttpException();
    }

    public function actionLike(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/user/default/login']);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');

        $post = $this->findPost($id);

        $currentUser = Yii::$app->user->identity;

        $post->like($currentUser);

        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }

    public function actionUnlike(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/user/default/login']);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');

        $post = $this->findPost($id);

        $currentUser = Yii::$app->user->identity;

        $post->unlike($currentUser);

        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }


}
