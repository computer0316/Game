<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $message
 * @property string $updatetime
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'updatetime'], 'required'],
            [['updatetime'], 'safe'],
            [['mobile'], 'string', 'max' => 16],
            [['message'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'message' => 'Message',
            'updatetime' => 'Updatetime',
        ];
    }
}
