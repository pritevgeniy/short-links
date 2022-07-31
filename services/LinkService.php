<?php

declare(strict_types=1);

namespace app\services;

use Yii;
use app\models\Link;
use yii\web\NotFoundHttpException;

class LinkService
{
    /**
     * @param string $short
     * @return string
     * @throws NotFoundHttpException
     */
    public function find(string $short): string
    {
        $cache = Yii::$app->cache;
        $link = $cache->get($short);

        if (!$link) {
            $model = Link::findOne(['short' => $short]);
            if (!$model) {
                throw new NotFoundHttpException();
            }
        }

        return $link;
    }
}