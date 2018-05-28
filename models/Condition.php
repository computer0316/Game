<?php
namespace app\models;

use yii\base\Model;
use app\models\District;

class Condition extends Model{
		public static function setValue($value){
			if(isset($value) && $value <> '' && $value <> -1){
				return $value;
			}
			else{
				return null;
			}
		}

		public static function create($item, $name){
			if(isset($item) && $item <> -1 && $item <> '' && $item <> '-1'){
				return $name . ' = ' . $item;
			}
		}

		public static function createServer($big){
			if($big <> '不限'){
				return 'district = ' . District::find()->where("big = '" . $big . "'")->one()->id;
			}
		}

		public static function createSchool($school){
			switch($school){
				case 1:
					return 'school in (1,3,9)';
					break;
				case 2:
					return 'school in (5,7)';
					break;
				case 3:
					return 'school in (2,4,6,8)';
					break;
			}
		}

		public static function createLevel($level){
			switch($level){
				case 1:
					return 'level >=0 and level < 70';
					break;
				case 2:
					return 'level >=70 and level < 90';
					break;
				case 3:
					return 'level >= 90';
					break;
			}
		}

		public static function createPrice($price1, $price2){
			if($price1 <> '' && $price2 <> '' && $price1 * $price2 > 0){
				return 'price > ' . $price1 . ' and price < ' . $price2;
			}
		}

		public static function join($old, $new){
			if($old <> '' && $new <> ''){
				return $old . ' and ' . $new;
			}
			if($old <> ''){
				return $old;
			}
			if($new <> ''){
				return $new;
			}
		}

}