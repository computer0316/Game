<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property string $category
 * @property integer $price
 * @property integer $role
 * @property integer $coin
 * @property integer $pets
 * @property integer $arm
 * @property string $os
 * @property integer $district
 * @property integer $level
 * @property string $bind
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
            [['price', 'district', 'sex', 'school', 'monster', 'discuss', 'note', 'updatetime'], 'required'],
            [['price', 'role', 'coin', 'level', 'sex', 'monster', 'discuss'], 'integer'],
            [['os', 'category', 'pets', 'bind', 'arm', 'defence', 'district', 'school'], 'integer', 'message' => '{attribute} 必须选择'],
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
            'id' => 'ID',
            'category' => 'Category',
            'price' => 'Price',
            'role' => 'Role',
            'coin' => 'Coin',
            'pets' => 'Pets',
            'arm' => 'Arm',
            'os' => 'Os',
            'district' => 'District',
            'level' => 'Level',
            'bind' => 'Bind',
            'sex' => 'Sex',
            'school' => 'School',
            'monster' => 'Monster',
            'discuss' => 'Discuss',
            'note' => 'Note',
            'updatetime' => 'Updatetime',
        ];
    }
}
