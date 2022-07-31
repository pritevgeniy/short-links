<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\base\ErrorException;
use yii\base\Model;
use yii\base\Exception;

class LinkForm extends Model
{
    public $link;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['link'], 'required'],
            [['link'], 'url'],
        ];
    }

    /**\
     * @return Link
     * @throws ErrorException
     * @throws Exception
     */
    public function create(): Link
    {
        $model = new Link();
        $model->short = Yii::$app->security->generateRandomString(10);
        $model->long = $this->link;
        if (!$model->save()) {
            throw new ErrorException('Error save');
        }

        return $model;
    }
}
