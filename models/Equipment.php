<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property integer $price
 * @property string $server
 * @property integer $district
 * @property integer $level
 * @property string $type
 * @property integer $sex
 * @property integer $school
 * @property integer $monster
 * @property integer $discuss
 * @property string $note
 * @property string $updatetime
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'os', 'district', 'level', 'type', 'sex', 'school', 'monster', 'discuss', 'note', 'updatetime'], 'required'],
            [['price', 'district', 'level', 'sex', 'school', 'monster', 'discuss'], 'integer'],
            [['updatetime'], 'safe'],
            [['os', 'type'], 'string', 'max' => 16],
            [['note'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品编号',
            'price' => '价格',
            'os' => '平台',
            'district' => '大区',
            'level' => '等级',
            'type' => '账号类型',
            'sex' => '性别',
            'school' => '门派',
            'monster' => '神兽数量',
            'discuss' => '能否议价',
            'note' => '卖家描述',
            'updatetime' => '更新时间',
        ];
    }
}
