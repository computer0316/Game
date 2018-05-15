<?php

namespace app\models;


use Yii;
use yii\helpers\VarDumper;
use yii\base\Model;


class Search extends Model
{
	public $text;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string', 'max' => 16],
        ];
    }

}
