<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use app\models\User;
	use app\models\Community;
	use app\models\District;
	use app\models\School;

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
		.list{
			font-size:0.9rem;
		}
		.list, .list tr, .list td{
			border:0px;
		}
		td{
			padding:5px 10px;
		}
		.last-tr td{
			border-bottom:1px solid deepskyblue;
			padding-bottom:15px;
		}
		.orange{
			color:deepskyblue;
		}
		.filter-div{
			position:absolute;
			top:118px;
			left:0px;
			display:none;
			width:100%;
			background:#ffffff;
			color:black;
			z-index:20;
		}
        .mask {
                position: absolute;
                top: 0;
                left: 0;
                filter: alpha(opacity=60);
                background-color: #777;
                z-index: 10;
                opacity:0.7;
                -moz-opacity:0.7;
        }
        #menu{
        	float:left;
        	width:100%;
        	border-top:10px solid #f7f7f7;
        	border-bottom:10px solid #f7f7f7;
        }
        #menu p{
        	float:left;
        	width:18%;
        	//border:1px solid deepskyblue;
        	margin-left:5%;
        	text-align:center;
        }
        .price-arrow{
        	float:left;
        	height:10px;

        }
        .two-box{
			float:left;
			width:45%;
			height:36px;
			margin:10px 2%;
			text-align:center;
			border:1px solid deepskyblue;
        }
        .two-box p{
        	display:inline;
        	line-height:36px;
        	margin:0;
        }
        .two-box img, #menu img{
        	display:inline;
        	width:18px;
        }
   		#filter-div2{
			height:300px;
			overflow:hidden;
			padding-bottom:20px;
		}
		#filter-div2 ul{
			height:300px;
        	float:left;
        	overflow:scroll;
        }
        #filter-div2 .ul1{
        	width:20%;
        	padding:0;margin-left:1%;
        	text-align:center;
        }
        #filter-div2 .ul2{
        	width:76%;
        	padding:0;margin-left:1%;
        }
        #filter-div2 .ul1 li{
        	width:100%;
        	line-height:35px;
        	float:left;
        	padding:0px;margin:0px;
        }
        .ul2 li{
        	border:1px solid deepskyblue;
        	width:28%;
        	height:30px;
        	float:left;
        	margin:2%;
        	text-align:center;
        	line-height:28px;
        }
        #filter-div3{
        	padding-top:10px;
        }
        .pagination{
        	list-style-type:none;
        	margin:0;
        	padding:0;
        }
        .pagination li{
        	border:1px solid deepskyblue;
        	padding:2px 8px;
        	margin:0 2px;
        	float:left;
        }
        .pagination li a{
        	width:100%;
        	height:100%;
        	display:block;
        }
/*************  form   *************/
		.l10 input{width:10px;}
		.l12 input{width:20px;}
		.l30 input{width:30px;}
		.l40 input{width:40px;}
		.l50 input{width:50px;}
		.l80 input{width:80px;}
		.l100 input{width:100px;}
		.l120 input{width:120px;}
		.l150 input{width:150px;}
		.l180 input{width:180px;}
		.l240 input{width:240px;}
		.l300 input{width:300px;}
		.l360 input{width:360px;}

		.form-group{
			float:left;
			clear:both;
			height:65px;
		}
		.form-group label{
			float:left;
			text-align:right;
			font-size:14px;
			margin:0 10px;
			line-height:35px;
		}
		.form-group .help-block{
			margin-left:110px;
			font-size:12px;
			color:red;
		}
		.button-group{
			float:left;
			clear:both;
			width:100%;
			text-align:center;
			margin:25px 0;
		}

		select,input{
			border:1px solid deepskyblue;
			height:35px;
			width:60px;
			padding-left:5px;
		}

		.in-line{
			float:left;
		}
		.in-line label{
			font-size:14px;
			margin-left:15px;
			line-height:35px;
		}
		.in-line .help-block{
			margin-left:10px;
			font-size:12px;
			color:red;
		}
		input[type="file"]{
			border:none;
		}
		button{
			width:20%;
			height:35px;
			border-radius:10px;
			border:1px solid #d7d7d7;
			background-color:#d7d7d7;
		}
		#search{
			width:100%;
			float:left;
			margin:10px 0;
		}
		#search{
			float:left;
			width:95%;
			margin:0 10px;
			border:1px solid deepskyblue;
			border-radius:10px;
			height:30px;
		}
		#search-text{
			float:left;
			width:82%;
			border:0px white;
			outline:none;
			margin:0 15px;
			height:25px;
		}
		#searchimg{
			float:right;
			margin-right:5px;
			margin-top:2px;
			outline:none;
			width:25px;
			height:25px;
			border:0;
		}
    </style>
<div class="site-about">
	<div id="search">
		<?php $form = ActiveForm::begin(['action' => Url::toRoute('site/search'), 'method' => 'post']); ?>
			<?= $form->field($search, 'text', ['options' => ['class' => 'search-form']])->textInput(['class' => 'search-input'])->label(false) ?>
			<input type="image" id="searchimg" src="images/search.png" />
		<?php ActiveForm::end(); ?>
	</div>
	<div id="menu">
		<p id="p1" onclick="showMask1()">平台<img src="images/down.png" /></p>
		<p id="p2" onclick="showMask2()">服务器<img src="images/down.png" /></p>
		<p id="p3" onclick="showMask3()">筛选<img src="images/down.png" /></p>
		<p id="p4" onclick="showMask()">价格<img src="images/ad.png" /></p>
	</div>
	<div id="filter-div1" class="filter-div">
		<a href="<?=Url::current(['os' => '苹果专区'])?>">
			<div class="two-box"><img src="images/apple.png" /> <p>苹果专区</p></div>
		</a>
		<a href="<?=Url::current(['os' => '安卓官服'])?>">
			<div class="two-box"><img src="images/android.png" /> <p>安卓官服</p></div>
		</a>
		<a href="<?=Url::current(['os' => '苹果安卓互通区'])?>">
			<div class="two-box"><img src="images/apple.png" /> <img src="images/android.png" /> <p>苹果安卓互通区</p></div>
		</a>
		<a href="<?=Url::current(['os' => null])?>"><div class="two-box"><p>全部</p></div></a>
	</div>
	<div id="filter-div2" class="filter-div">
		<ul class="ul1">
	    	<li data-type="-1">不限</li>
			<li data-type="1">一区</li>
			<li data-type="2">二区</li>
			<li data-type="3">三区</li>
			<li data-type="4">四区</li>
			<li data-type="5">五区</li>
			<li data-type="6">六区</li>
			<li data-type="7">七区</li>
			<li data-type="8">八区</li>
			<li data-type="9">九区</li>
			<li data-type="10">十区</li>
			<li data-type="11">十一区</li>
			<li data-type="12">十二区</li>
			<li data-type="13">十三区</li>
			<li data-type="14">十四区</li>
			<li data-type="15">双平台</li>
			<li data-type="16">安卓混服</li>
	    </ul>
		<ul class="ul2">
			<a href="<?=Url::current(['district' => 1])?>"><li data-type="1">桃园结义</li></a>
			<a href="<?=Url::current(['district' => 2])?>"><li data-type="1">八仙过海</li></a>
			<a href="<?=Url::current(['district' => 3])?>"><li data-type="1">高山流水</li></a>
			<a href="<?=Url::current(['district' => 4])?>"><li data-type="1">花好月圆</li></a>
			<a href="<?=Url::current(['district' => 5])?>"><li data-type="1">四海升平</li></a>
			<a href="<?=Url::current(['district' => 6])?>"><li data-type="1">物华天宝</li></a>
			<a href="<?=Url::current(['district' => 7])?>"><li data-type="1">海纳百川</li></a>
			<a href="<?=Url::current(['district' => 8])?>"><li data-type="1">群星璀璨</li></a>
			<a href="<?=Url::current(['district' => 9])?>"><li data-type="1">天下无双</li></a>
			<a href="<?=Url::current(['district' => 10])?>"><li data-type="1">梦回唐朝</li></a>
			<a href="<?=Url::current(['district' => 11])?>"><li data-type="1">开辟鸿蒙</li></a>
			<a href="<?=Url::current(['district' => 12])?>"><li data-type="1">紫气东来</li></a>
			<a href="<?=Url::current(['district' => 13])?>"><li data-type="1">紫禁之巅</li></a>
			<a href="<?=Url::current(['district' => 14])?>"><li data-type="1">华夏</li></a>
			<a href="<?=Url::current(['district' => 15])?>"><li data-type="1">彩云追月</li></a>
			<a href="<?=Url::current(['district' => 16])?>"><li data-type="1">似水流年</li></a>
			<a href="<?=Url::current(['district' => 17])?>"><li data-type="1">花样年华</li></a>
			<a href="<?=Url::current(['district' => 18])?>"><li data-type="1">缘定三生</li></a>
			<a href="<?=Url::current(['district' => 19])?>"><li data-type="1">地久天长</li></a>
			<a href="<?=Url::current(['district' => 20])?>"><li data-type="1">群英荟萃</li></a>
			<a href="<?=Url::current(['district' => 21])?>"><li data-type="1">国色天香</li></a>
			<a href="<?=Url::current(['district' => 22])?>"><li data-type="1">海阔天空</li></a>
			<a href="<?=Url::current(['district' => 23])?>"><li data-type="1">三阳开泰</li></a>
			<a href="<?=Url::current(['district' => 24])?>"><li data-type="1">天涯海角</li></a>
			<a href="<?=Url::current(['district' => 25])?>"><li data-type="1">万里长城</li></a>
			<a href="<?=Url::current(['district' => 26])?>"><li data-type="1">再续前缘</li></a>
			<a href="<?=Url::current(['district' => 27])?>"><li data-type="2">身似菩提</li></a>
			<a href="<?=Url::current(['district' => 28])?>"><li data-type="2">梦回奔日</li></a>
			<a href="<?=Url::current(['district' => 29])?>"><li data-type="2">麒麟山</li></a>
			<a href="<?=Url::current(['district' => 30])?>"><li data-type="2">西梁女国</li></a>
			<a href="<?=Url::current(['district' => 31])?>"><li data-type="2">瑶池圣地</li></a>
			<a href="<?=Url::current(['district' => 32])?>"><li data-type="2">长安城</li></a>
			<a href="<?=Url::current(['district' => 33])?>"><li data-type="2">东海湾</li></a>
			<a href="<?=Url::current(['district' => 34])?>"><li data-type="2">五丁开山</li></a>
			<a href="<?=Url::current(['district' => 35])?>"><li data-type="2">蓬莱仙岛</li></a>
			<a href="<?=Url::current(['district' => 36])?>"><li data-type="2">秋水人家</li></a>
			<a href="<?=Url::current(['district' => 37])?>"><li data-type="2">江南野外</li></a>
			<a href="<?=Url::current(['district' => 38])?>"><li data-type="3">雷霆万钧</li></a>
			<a href="<?=Url::current(['district' => 39])?>"><li data-type="3">四法青云</li></a>
			<a href="<?=Url::current(['district' => 40])?>"><li data-type="3">画龙点睛</li></a>
			<a href="<?=Url::current(['district' => 41])?>"><li data-type="4">名扬四海</li></a>
			<a href="<?=Url::current(['district' => 42])?>"><li data-type="4">百花齐放</li></a>
			<a href="<?=Url::current(['district' => 43])?>"><li data-type="4">卧虎藏龙</li></a>
			<a href="<?=Url::current(['district' => 44])?>"><li data-type="4">执子之手</li></a>
			<a href="<?=Url::current(['district' => 45])?>"><li data-type="5">钱塘江</li></a>
			<a href="<?=Url::current(['district' => 46])?>"><li data-type="5">燕赵风云</li></a>
			<a href="<?=Url::current(['district' => 47])?>"><li data-type="5">城隍庙</li></a>
			<a href="<?=Url::current(['district' => 48])?>"><li data-type="5">钓鱼岛</li></a>
			<a href="<?=Url::current(['district' => 49])?>"><li data-type="5">碧落星空</li></a>
			<a href="<?=Url::current(['district' => 50])?>"><li data-type="5">暮雨朝云</li></a>
			<a href="<?=Url::current(['district' => 51])?>"><li data-type="6">香蜜湖</li></a>
			<a href="<?=Url::current(['district' => 52])?>"><li data-type="6">金榜题名</li></a>
			<a href="<?=Url::current(['district' => 53])?>"><li data-type="6">彩云之南</li></a>
			<a href="<?=Url::current(['district' => 54])?>"><li data-type="6">凌云殿</li></a>
			<a href="<?=Url::current(['district' => 55])?>"><li data-type="6">姑苏城</li></a>
			<a href="<?=Url::current(['district' => 56])?>"><li data-type="6">花开富贵</li></a>
			<a href="<?=Url::current(['district' => 57])?>"><li data-type="6">倾国倾城</li></a>
			<a href="<?=Url::current(['district' => 58])?>"><li data-type="6">飞砂走石</li></a>
			<a href="<?=Url::current(['district' => 59])?>"><li data-type="6">万紫千红</li></a>
			<a href="<?=Url::current(['district' => 60])?>"><li data-type="6">龙凤呈祥</li></a>
			<a href="<?=Url::current(['district' => 61])?>"><li data-type="7">仙履奇缘</li></a>
			<a href="<?=Url::current(['district' => 62])?>"><li data-type="7">顶天立地</li></a>
			<a href="<?=Url::current(['district' => 63])?>"><li data-type="7">长乐永昌</li></a>
			<a href="<?=Url::current(['district' => 64])?>"><li data-type="7">前程似锦</li></a>
			<a href="<?=Url::current(['district' => 65])?>"><li data-type="7">紫陌红尘</li></a>
			<a href="<?=Url::current(['district' => 66])?>"><li data-type="7">梦想岛</li></a>
			<a href="<?=Url::current(['district' => 67])?>"><li data-type="7">如画如诗</li></a>
			<a href="<?=Url::current(['district' => 68])?>"><li data-type="8">一生所爱</li></a>
			<a href="<?=Url::current(['district' => 69])?>"><li data-type="8">红颜知己</li></a>
			<a href="<?=Url::current(['district' => 70])?>"><li data-type="8">繁花似锦</li></a>
			<a href="<?=Url::current(['district' => 71])?>"><li data-type="8">开创未来</li></a>
			<a href="<?=Url::current(['district' => 72])?>"><li data-type="8">仗剑天涯</li></a>
			<a href="<?=Url::current(['district' => 73])?>"><li data-type="8">夏日浓情</li></a>
			<a href="<?=Url::current(['district' => 74])?>"><li data-type="8">人月两圆</li></a>
			<a href="<?=Url::current(['district' => 75])?>"><li data-type="8">前所未有</li></a>
			<a href="<?=Url::current(['district' => 76])?>"><li data-type="8">欢天喜地</li></a>
			<a href="<?=Url::current(['district' => 77])?>"><li data-type="8">心心相印</li></a>
			<a href="<?=Url::current(['district' => 78])?>"><li data-type="8">一起结婚</li></a>
			<a href="<?=Url::current(['district' => 79])?>"><li data-type="9">朝阳鸣凤</li></a>
			<a href="<?=Url::current(['district' => 80])?>"><li data-type="9">龙飞凤舞</li></a>
			<a href="<?=Url::current(['district' => 81])?>"><li data-type="9">四季平安</li></a>
			<a href="<?=Url::current(['district' => 82])?>"><li data-type="9">大唐盛世</li></a>
			<a href="<?=Url::current(['district' => 83])?>"><li data-type="9">剑歌红尘</li></a>
			<a href="<?=Url::current(['district' => 84])?>"><li data-type="9">红尘如梦</li></a>
			<a href="<?=Url::current(['district' => 85])?>"><li data-type="9">一起幸福</li></a>
			<a href="<?=Url::current(['district' => 86])?>"><li data-type="10">清风自在</li></a>
			<a href="<?=Url::current(['district' => 87])?>"><li data-type="10">人间芳菲</li></a>
			<a href="<?=Url::current(['district' => 88])?>"><li data-type="10">合家团圆</li></a>
			<a href="<?=Url::current(['district' => 89])?>"><li data-type="10">春和景明</li></a>
			<a href="<?=Url::current(['district' => 90])?>"><li data-type="10">锦绣山河</li></a>
			<a href="<?=Url::current(['district' => 91])?>"><li data-type="10">吉星高照</li></a>
			<a href="<?=Url::current(['district' => 92])?>"><li data-type="11">独占鳌头</li></a>
			<a href="<?=Url::current(['district' => 93])?>"><li data-type="11">童真童趣</li></a>
			<a href="<?=Url::current(['district' => 94])?>"><li data-type="11">如梦如诗</li></a>
			<a href="<?=Url::current(['district' => 95])?>"><li data-type="11">风和日丽</li></a>
			<a href="<?=Url::current(['district' => 96])?>"><li data-type="11">诗情画意</li></a>
			<a href="<?=Url::current(['district' => 97])?>"><li data-type="11">烟雨斜阳</li></a>
			<a href="<?=Url::current(['district' => 98])?>"><li data-type="12">雪满长空</li></a>
			<a href="<?=Url::current(['district' => 99])?>"><li data-type="12">锦瑟华年</li></a>
			<a href="<?=Url::current(['district' => 100])?>"><li data-type="12">王者归来</li></a>
			<a href="<?=Url::current(['district' => 101])?>"><li data-type="12">四海欢腾</li></a>
			<a href="<?=Url::current(['district' => 102])?>"><li data-type="12">暗香疏影</li></a>
			<a href="<?=Url::current(['district' => 103])?>"><li data-type="12">嫦娥奔月</li></a>
			<a href="<?=Url::current(['district' => 104])?>"><li data-type="12">一笑倾城</li></a>
			<a href="<?=Url::current(['district' => 105])?>"><li data-type="12">技压群雄</li></a>
			<a href="<?=Url::current(['district' => 106])?>"><li data-type="12">佳人如梦</li></a>
			<a href="<?=Url::current(['district' => 107])?>"><li data-type="13">招财进宝</li></a>
			<a href="<?=Url::current(['district' => 108])?>"><li data-type="13">气壮山河</li></a>
			<a href="<?=Url::current(['district' => 109])?>"><li data-type="13">情有独钟</li></a>
			<a href="<?=Url::current(['district' => 110])?>"><li data-type="13">龙行天下</li></a>
			<a href="<?=Url::current(['district' => 111])?>"><li data-type="13">一起恋爱</li></a>
			<a href="<?=Url::current(['district' => 112])?>"><li data-type="13">天下风云</li></a>
			<a href="<?=Url::current(['district' => 113])?>"><li data-type="14">以梦为马</li></a>
			<a href="<?=Url::current(['district' => 114])?>"><li data-type="14">酒意诗情</li></a>
			<a href="<?=Url::current(['district' => 115])?>"><li data-type="14">骑幻冒险</li></a>
			<a href="<?=Url::current(['district' => 116])?>"><li data-type="14">名扬万里</li></a>
			<a href="<?=Url::current(['district' => 117])?>"><li data-type="14">桃花依旧</li></a>
			<a href="<?=Url::current(['district' => 118])?>"><li data-type="14">天下归心</li></a>
			<a href="<?=Url::current(['district' => 119])?>"><li data-type="15">海棠迎风</li></a>
			<a href="<?=Url::current(['district' => 120])?>"><li data-type="15">明河星舟</li></a>
			<a href="<?=Url::current(['district' => 121])?>"><li data-type="15">2018</li></a>
			<a href="<?=Url::current(['district' => 122])?>"><li data-type="15">时空之隙</li></a>
			<a href="<?=Url::current(['district' => 123])?>"><li data-type="15">满堂花醉</li></a>
			<a href="<?=Url::current(['district' => 124])?>"><li data-type="15">灿烂千阳</li></a>
			<a href="<?=Url::current(['district' => 125])?>"><li data-type="15">因梦而在</li></a>
			<a href="<?=Url::current(['district' => 126])?>"><li data-type="15">华灯结彩</li></a>
			<a href="<?=Url::current(['district' => 127])?>"><li data-type="15">如意新春</li></a>
			<a href="<?=Url::current(['district' => 128])?>"><li data-type="15">旺福迎春</li></a>
			<a href="<?=Url::current(['district' => 129])?>"><li data-type="15">双面伊人</li></a>
			<a href="<?=Url::current(['district' => 130])?>"><li data-type="15">两心相知</li></a>
			<a href="<?=Url::current(['district' => 131])?>"><li data-type="15">十年一梦</li></a>
			<a href="<?=Url::current(['district' => 132])?>"><li data-type="15">愿闻花名</li></a>
			<a href="<?=Url::current(['district' => 133])?>"><li data-type="15">河洛天工</li></a>
			<a href="<?=Url::current(['district' => 134])?>"><li data-type="15">洛阳匠心</li></a>
			<a href="<?=Url::current(['district' => 135])?>"><li data-type="15">流萤灯</li></a>
			<a href="<?=Url::current(['district' => 136])?>"><li data-type="15">风起之时</li></a>
			<a href="<?=Url::current(['district' => 137])?>"><li data-type="15">落花清寒</li></a>
			<a href="<?=Url::current(['district' => 138])?>"><li data-type="15">少年无畏</li></a>
			<a href="<?=Url::current(['district' => 139])?>"><li data-type="15">风之痕</li></a>
			<a href="<?=Url::current(['district' => 140])?>"><li data-type="15">秋声赋</li></a>
			<a href="<?=Url::current(['district' => 141])?>"><li data-type="15">一战倾城</li></a>
			<a href="<?=Url::current(['district' => 142])?>"><li data-type="15">逍遥游</li></a>
			<a href="<?=Url::current(['district' => 143])?>"><li data-type="15">四海九州</li></a>
			<a href="<?=Url::current(['district' => 144])?>"><li data-type="15">此生不换</li></a>
			<a href="<?=Url::current(['district' => 145])?>"><li data-type="15">海之彼端</li></a>
			<a href="<?=Url::current(['district' => 146])?>"><li data-type="15">风样自由</li></a>
			<a href="<?=Url::current(['district' => 147])?>"><li data-type="15">相见恨晚</li></a>
			<a href="<?=Url::current(['district' => 148])?>"><li data-type="15">三生情缘</li></a>
			<a href="<?=Url::current(['district' => 149])?>"><li data-type="15">对月歌</li></a>
			<a href="<?=Url::current(['district' => 150])?>"><li data-type="15">皓月千里</li></a>
			<a href="<?=Url::current(['district' => 151])?>"><li data-type="15">幸福群像</li></a>
			<a href="<?=Url::current(['district' => 152])?>"><li data-type="15">那时花开</li></a>
			<a href="<?=Url::current(['district' => 153])?>"><li data-type="15">致青春</li></a>
			<a href="<?=Url::current(['district' => 154])?>"><li data-type="15">夏日香气</li></a>
			<a href="<?=Url::current(['district' => 155])?>"><li data-type="15">携手逐梦</li></a>
			<a href="<?=Url::current(['district' => 156])?>"><li data-type="15">心意相通</li></a>
			<a href="<?=Url::current(['district' => 157])?>"><li data-type="15">咕噜咕噜</li></a>
			<a href="<?=Url::current(['district' => 158])?>"><li data-type="15">冬日恋曲</li></a>
			<a href="<?=Url::current(['district' => 159])?>"><li data-type="15">似水年华</li></a>
			<a href="<?=Url::current(['district' => 160])?>"><li data-type="15">雪之歌</li></a>
			<a href="<?=Url::current(['district' => 161])?>"><li data-type="15">琉璃城</li></a>
			<a href="<?=Url::current(['district' => 162])?>"><li data-type="16">安卓混服</li></a>
			<a href="<?=Url::current(['district' => -1])?>"><li data-type="-1">不限</li></li></a>
			<div class="cb"></div>
		</ul>
	</div>
	<div id="filter-div3" class="filter-div">

		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'bind')->dropDownList(['不限' => '不限', '手机账号' => '手机账号', '签合同账号' => '签合同账号', '找回包赔账号' => '找回包赔账号', '三无账号' => '三无账号']) ?>
        <?= $form->field($model, 'sex', ['options' => ['class' => 'in-line']])->dropDownList([100 => '不限', '1'=>'男','0'=>'女']) ?>
        <?= $form->field($model, 'discuss', ['options' => ['class' => 'in-line']])->dropDownList([100 => '不限', '1'=>'能','0'=>'否']) ?>
        <?= $form->field($model, 'level') ?>
        <?= $form->field($model, 'category', ['options' => ['class' => 'in-line']])->dropDownList(['不限' => '不限', '成品号' => '成品号', '金币号' => '金币号', '装备专区' => '装备专区', '宠物专区' => '宠物专区']) ?>
        <?= $form->field($model, 'school', ['options' => ['class' => 'in-line']])->dropDownList(School::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => '不限']) ?>
        <?= $form->field($model, 'price1') ?>
        <?= $form->field($model, 'price2', ['options' => ['class' => 'in-line']])->label("&nbsp;") ?>
        <?= $form->field($model, 'monster1') ?>
        <?= $form->field($model, 'monster2', ['options' => ['class' => 'in-line']])->label("&nbsp;") ?>

        <div class="button-group">
        	<?= Html::resetButton('重置', ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('确认', ['class' => 'btn btn-primary']) ?>
        </div>
	    <?php ActiveForm::end(); ?>
	</div>
	<div id="mask" class="mask" onclick="hideMask()"></div>

<?php

		if(!$equipments){
			echo '还没有任何信息';
		}
		else{
			echo "<table class='list'>\n";
			foreach($equipments as $e){
				echo '<tr>';
					echo '<td>';
					echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
					echo '(' . $e->id . ')';
					echo ($e->discuss=="0" ? '不议价' : '可议价') . ' ';
					echo $e->os . ' ';
					echo District::findOne($e->district)->big . ' ';
					echo District::findOne($e->district)->name . ' ';
					echo $e->bind . ' ';
					echo $e->level . '级 ';
					echo ($e->sex ==0 ? '女': '男') . ' ';
					echo School::findOne($e->school)->name . ' ';
					echo $e->monster . '神兽 ';
					echo $e->note . $e->note;
					echo '</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td style="color:#ccc">';
					echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
						echo $e->os . ' | ';
						echo District::findOne($e->district)->big . ' | ';
						echo District::findOne($e->district)->name . ' | ';
						echo School::findOne($e->school)->name . ' | ';
						echo $e->bind;
						echo '</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr class="last-tr">';
					echo '<td>';
					echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
					echo '<span style="color:deepskyblue">￥'. $e->price . '.00</span>';
					echo '<span style="float:right;color:#ccc;">' . $e->updatetime . '</span>';
					echo '</a>';
					echo "</td>";
				echo "</tr>\n";
			}
			echo '</table>';
			echo '<div style="width:100%;float:left;margin:5px 0 90px 0;">';
			echo LinkPager::widget(['pagination' => $pagination,]);
			echo '</div>';
		}
		?>
	</div>
</div>
<script type="text/javascript">
	// 根据左侧选择的大区，调出右边大区对应的服务器
	$(document).ready(function(){
		$(".ul1 li").click(function(){
			var num = $(this).attr("data-type");
			$(".ul2 li").css("display", "none");
			$(".ul2 li[data-type=" + num + "]").css("display", "block");
		});
	});
</script>

<script type="text/javascript">//显示灰色 jQuery 遮罩层

	/* 筛选菜单遮罩 */
	function showMask1() {
        $("#filter-div1").css('display', 'block');
        $("#filter-div2").css('display', 'none');
        $("#filter-div3").css('display', 'none');
        show();
	}
	function showMask2() {
	    $("#filter-div2").css('display', 'block');
	    $("#filter-div1").css('display', 'none');
	    $("#filter-div3").css('display', 'none');
        show();
	}
	function showMask3() {
	    $("#filter-div3").css('display', 'block');
	    $("#filter-div1").css('display', 'none');
	    $("#filter-div2").css('display', 'none');
        show();
	}
	function show(){
		$("#mask").css("height",$(document.body).height());
        $("#mask").css("width",$(document.body).width());
        $("#mask").css("top",120);
        $("#mask").show();
	}
    function hideMask(){
        $("#mask").hide();
        $("#filter-div1").css('display', 'none');
        $("#filter-div2").css('display', 'none');
        $("#filter-div3").css('display', 'none');
    }
</script>