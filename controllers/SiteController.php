<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Link;
use app\models\LinkForm;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\ErrorException
     * @throws \yii\base\Exception
     */
    public function actionIndex()
    {
        $model = new LinkForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $modelLink = $model->create();

            return $this->redirect('/show/' . $modelLink->short);
        }

        return $this->render('index', ['model' => $model]);
    }

    /**
     * @param string $short
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionShow(string $short): string
    {
        $model = Link::findOne(['short' => $short]);
        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('show', array(
            'model' => $model
        ));
    }

    /**
     * @param string $short
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionRedirect(string $short): Response
    {
        $model = Link::findOne(['short' => $short]);
        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->redirect($model->long);
    }
}
