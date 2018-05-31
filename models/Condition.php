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

		public static function createDistrict($district){
			if($district <> ''){
				return 'district = ' . $district;
			}
		}

		public static function createBig($big){
			$d_names = ['0' => '不限','1' => '一区','2' => '二区','3' => '三区','4' => '四区','5' => '五区','6' => '六区','7' => '七区','8' => '八区','9' => '九区','10' => '十区','11' => '十一区','12' => '十二区','13' => '十三区','14' => '十四区','15' => '双平台','16' => '安卓混服'];
			if($big <> 0){
				$str = 'district in (';
				$servers = District::find()->where("big = '" . $d_names[$big] . "'")->column();
				foreach($servers as $server){
					$str .= $server . ',';
				}
				$str = trim($str, ",");
				$str .= ')';
				return $str;
			}
		}

		public static function createSchool($school){
			if($school > 20){
				switch($school){
					case 100:
						return 'school in (1,3,9)';
						break;
					case 200:
						return 'school in (5,7)';
						break;
					case 300:
						return 'school in (2,4,6,8)';
						break;
				}
			}
			if($school<>'' && $school > 0){
				return 'school = ' . $school;
			}
		}

		public static function createLevel($level){
			switch($level){
				case 1000:
					return 'level >=0 and level < 70';
					break;
				case 2000:
					return 'level >=70 and level < 90';
					break;
				case 3000:
					return 'level >= 90';
					break;
			}
			if($level <> '' && $level > 0){
				return 'level = ' . $level;
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