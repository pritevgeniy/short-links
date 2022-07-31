<?php

namespace app\controllers;

use app\services\LinkService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\LinkForm;
use yii\web\Response;

class SiteController extends Controller
{
    private LinkService $service;
    public function __construct($id, $module, LinkService $service, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->service = $service;
    }

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
        $this->service->find($short);

        return $this->render('show', array(
            'short' => $short
        ));
    }

    /**
     * @param string $short
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionRedirect(string $short): Response
    {
        $link = $this->service->find($short);

        return $this->redirect($link);
    }
}
