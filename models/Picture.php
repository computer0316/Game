<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property integer $id
 * @property string $path
 */
class Picture extends \yii\db\ActiveRecord
{
	public function create($id, $path){
		$this->equipmentid	= $id;
		$this->path			= $path;
		$this->save();
	}

	public function deletePics($id){
		$pics = $this->find()->where(['equipmentid' => $id])->all();
		foreach($pics as $pic){
			unlink($pic->path);
			$pic->delete();
		}
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['equipmentid'], 'integer'],
            [['path'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipmentid'	=> 'װ�����',
            'path'			=> '·��',
        ];
    }
}
