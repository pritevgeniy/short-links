<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $short
 * @property string $long
 * @property string|null $created_at
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short', 'long'], 'required'],
            [['long'], 'string'],
            [['created_at'], 'safe'],
            [['short'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short' => 'Short',
            'long' => 'Long',
            'created_at' => 'Created At',
        ];
    }
}
