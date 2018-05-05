<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property integer $bestone
 * @property integer $category
 * @property integer $price
 * @property integer $role
 * @property integer $coin
 * @property integer $pets
 * @property integer $arm
 * @property integer $defence
 * @property integer $os
 * @property integer $district
 * @property integer $level
 * @property integer $bind
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
            [['bestone', 'category', 'price', 'role', 'coin', 'pets', 'arm', 'defence', 'os', 'district', 'level', 'bind', 'sex', 'school', 'monster', 'discuss'], 'integer'],
            [['category', 'price', 'os', 'district', 'level', 'bind', 'sex', 'school', 'monster', 'discuss', 'note', 'updatetime'], 'required'],
            [['updatetime'], 'safe'],
            [['note'], 'string', 'max' => 512],
        ];
    }

    public function scenarios(){
		$scenarios = parent::scenarios();
        $scenarios['seek'] = ['category', 'os', 'district', 'level', 'bind', 'school', 'sex', 'discuss', 'monster'];
        return $scenarios;
	}
	
   /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'		=> 'ID',
            'bestone'	=> '精选',
            'category'	=> '种类',
            'price'		=> '价格',
            'role'		=> '角色',
            'coin'		=> '金币',
            'pets'		=> '宠物',
            'arm'		=> '武器',
            'defence'	=> '防具',
            'os'		=> '操作系统',
            'district'	=> '服务器',
            'level'		=> '级别',
            'bind'		=> '绑定类型',
            'sex'		=> '性别',
            'school'	=> '门派',
            'monster'	=> '神兽',
            'discuss'	=> '能否议价',
            'note'		=> '说明',
            'price1'	=> '价格',
            'monster1'	=> '神兽',
            'updatetime' => 'Updatetime',
        ];
    }
}
