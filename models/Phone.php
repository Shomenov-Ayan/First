<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "phone".
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property int $type
 * @property string $data_create
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type'], 'integer'],
            [['data_create'], 'safe'],
            [['phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'phone' => 'Phone',
            'type' => 'Type',
            'data_create' => 'Data Create',
        ];
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);

    }
    public function getAllUser(){
        return ArrayHelper::map(User::find()->all(),'id', 'name');
    }
    public function getTypes(){
        return $this->hasOne(Types::className(),['id'=>'user_id']);

    }
    public function getAllTypes(){
        return ArrayHelper::map(Types::find()->all(),'id', 'types');
    }
}
