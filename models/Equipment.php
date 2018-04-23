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
	
	public $price1;
	public $price2;
	public $monster1;
	public $monster2;
	
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
            [['price', 'category', 'os', 'district', 'level', 'bind', 'sex', 'school', 'monster', 'discuss', 'note', 'updatetime'], 'required', 'on' => 'create'],
            [['price', 'district', 'level', 'sex', 'school', 'monster', 'discuss'], 'integer'],
            [['updatetime'], 'safe'],
            [['category', 'os', 'bind'], 'string', 'max' => 16],
            [['note'], 'string', 'max' => 512],
        ];
    }

	public function scenarios()
	{
	    return [
	        'seek' => ['price1', 'price2', 'monster1', 'monster2', 'category', 'level', 'bind', 'sex', 'school', 'monster', 'discuss'], 
	        'create' => ['price', 'category', 'os', 'district', 'level', 'bind', 'sex', 'school', 'monster', 'discuss', 'note', 'updatetime'],
	    ];
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品编号',
            'category' => '账号分类',
            'price' => '价格',
            'os' => '平台',
            'district' => '大区',
            'level' => '等级',
            'bind' => '账号类型',
            'sex' => '性别',
            'school' => '门派',
            'monster' => '神兽数量',
            'discuss' => '能否议价',
            'note' => '卖家描述',
            'updatetime' => '更新时间',
            'price1'	=> '价格区间',
            'monster1' => '神兽数量',
        ];
    }
}
