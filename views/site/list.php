<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
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
			border-bottom:1px solid orangered;
			padding-bottom:15px;
		}
		.orange{
			color:orangered;
		}
		.filter-div{
			position:absolute;
			top:118px;
			left:0px;
			display:none;
			width:100%;
			background:#e7e7e7;
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
        	//border:1px solid orangered;
        	margin-left:5%;
        	text-align:center;
        }
        .two-box{
			float:left;
			width:45%;
			height:36px;
			margin:10px 2%;
			text-align:center;
			border:1px solid orangered;
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
		}
		#filter-div2 ul{
			height:300px;
        	float:left;
        	overflow:scroll;
        }
        #filter-div2 .ul1{
        	width:10%;
        }
        #filter-div2 .ul2{
        	width:78%;
        }
        #filter-div2 .ul1 li{
        	line-height:35px;
        }
        .ul2 li{
        	border:1px solid orangered;
        	width:28%;
        	height:28px;
        	float:left;
        	margin:2%;
        	text-align:center;
        }
    </style>
<div class="site-about">
	<div id="menu">
		<p id="p1" onclick="showMask1()">平台<img src="images/down.png" /></p>
		<p id="p2" onclick="showMask2()">服务器<img src="images/down.png" /></p>
		<p id="p3" onclick="showMask3()">筛选<img src="images/down.png" /></p>
		<p id="p4" onclick="showMask()">价格↕</p>
	</div>
	<div id="filter-div1" class="filter-div">
		<a href="<?=Url::toRoute(['site/list', 'os' => '苹果专区'])?>">
			<div class="two-box"><img src="images/apple.png" /> <p>苹果专区</p></div>
		</a>
		<a href="<?=Url::toRoute(['site/list', 'os' => '安卓官服'])?>">
			<div class="two-box"><img src="images/android.png" /> <p>安卓官服</p></div>
		</a>
		<a href="<?=Url::toRoute(['site/list', 'os' => '苹果安卓互通区'])?>">
			<div class="two-box"><img src="images/apple.png" /> <img src="images/android.png" /> <p>苹果安卓互通区</p></div>
		</a>
		<a href="<?=Url::toRoute('site/list')?>"><div class="two-box"><p>全部</p></div></a>
	</div>
	<div id="filter-div2" class="filter-div">
		<ul class="ul1">
	    	<li class="now">全部</li>
			<li data-type="3">一区</li>
			<li data-type="3">二区</li>
			<li data-type="3">三区</li>
			<li data-type="3">四区</li>
			<li data-type="3">五区</li>
			<li data-type="3">六区</li>
			<li data-type="3">七区</li>
			<li data-type="3">八区</li>
			<li data-type="3">九区</li>
			<li data-type="2">十区</li>
			<li data-type="2">十一区</li>
			<li data-type="2">十二区</li>
			<li data-type="2">十三区</li>
			<li data-type="2">十四区</li>
			<li data-type="4">双平台</li>
			<li data-type="1">安卓混服</li>
	    </ul>
		<ul class="ul2">
			<li data-var='' class="diy"><span>全部</span></li>
			<li data-type='3'  data-var='桃园结义'   data-xt="0"><span>桃园结义</span></li>
			<li data-type='3'  data-var='八仙过海'   data-xt="0"><span>八仙过海</span></li>
			<li data-type='3'  data-var='高山流水'   data-xt="0"><span>高山流水</span></li>
			<li data-type='3'  data-var='花好月圆'   data-xt="0"><span>花好月圆</span></li>
			<li data-type='3'  data-var='四海升平'   data-xt="0"><span>四海升平</span></li>
			<li data-type='3'  data-var='物华天宝'   data-xt="0"><span>物华天宝</span></li>
			<li data-type='3'  data-var='海纳百川'   data-xt="0"><span>海纳百川</span></li>
			<li data-type='3'  data-var='群星璀璨'   data-xt="0"><span>群星璀璨</span></li>
			<li data-type='3'  data-var='天下无双'   data-xt="0"><span>天下无双</span></li>
			<li data-type='3'  data-var='梦回唐朝'   data-xt="0"><span>梦回唐朝</span></li>
			<li data-type='3'  data-var='开辟鸿蒙'   data-xt="0"><span>开辟鸿蒙</span></li>
			<li data-type='3'  data-var='紫气东来'   data-xt="0"><span>紫气东来</span></li>
			<li data-type='3'  data-var='紫禁之巅'   data-xt="0"><span>紫禁之巅</span></li>
			<li data-type='3'  data-var='华夏'   data-xt="0"><span>华夏</span></li>
			<li data-type='3'  data-var='彩云追月'   data-xt="1"><span>彩云追月</span></li>
			<li data-type='3'  data-var='似水流年'   data-xt="1"><span>似水流年</span></li>
			<li data-type='3'  data-var='花样年华'   data-xt="1"><span>花样年华</span></li>
			<li data-type='3'  data-var='缘定三生'   data-xt="1"><span>缘定三生</span></li>
			<li data-type='3'  data-var='地久天长'   data-xt="1"><span>地久天长</span></li>
			<li data-type='3'  data-var='群英荟萃'   data-xt="1"><span>群英荟萃</span></li>
			<li data-type='3'  data-var='国色天香'   data-xt="1"><span>国色天香</span></li>
			<li data-type='3'  data-var='海阔天空'   data-xt="1"><span>海阔天空</span></li>
			<li data-type='3'  data-var='三阳开泰'   data-xt="1"><span>三阳开泰</span></li>
			<li data-type='3'  data-var='天涯海角'   data-xt="1"><span>天涯海角</span></li>
			<li data-type='3'  data-var='万里长城'   data-xt="1"><span>万里长城</span></li>
			<li data-type='3'  data-var='再续前缘'   data-xt="1"><span>再续前缘</span></li>
			<li data-type='3'  data-var='身似菩提'   data-xt="0"><span>身似菩提</span></li>
			<li data-type='3'  data-var='梦回奔日'   data-xt="0"><span>梦回奔日</span></li>
			<li data-type='3'  data-var='麒麟山'   data-xt="0"><span>麒麟山</span></li>
			<li data-type='3'  data-var='西梁女国'   data-xt="0"><span>西梁女国</span></li>
			<li data-type='3'  data-var='瑶池圣地'   data-xt="0"><span>瑶池圣地</span></li>
			<li data-type='3'  data-var='长安城'   data-xt="0"><span>长安城</span></li>
			<li data-type='3'  data-var='东海湾'   data-xt="0"><span>东海湾</span></li>
			<li data-type='3'  data-var='五丁开山'   data-xt="1"><span>五丁开山</span></li>
			<li data-type='3'  data-var='蓬莱仙岛'   data-xt="1"><span>蓬莱仙岛</span></li>
			<li data-type='3'  data-var='秋水人家'   data-xt="1"><span>秋水人家</span></li>
			<li data-type='3'  data-var='江南野外'   data-xt="1"><span>江南野外</span></li>
			<li data-type='3'  data-var='雷霆万钧'   data-xt="0"><span>雷霆万钧</span></li>
			<li data-type='3'  data-var='四法青云'   data-xt="0"><span>四法青云</span></li>
			<li data-type='3'  data-var='画龙点睛'   data-xt="1"><span>画龙点睛</span></li>
			<li data-type='3'  data-var='名扬四海'   data-xt="0"><span>名扬四海</span></li>
			<li data-type='3'  data-var='百花齐放'   data-xt="0"><span>百花齐放</span></li>
			<li data-type='3'  data-var='卧虎藏龙'   data-xt="1"><span>卧虎藏龙</span></li>
			<li data-type='3'  data-var='执子之手'   data-xt="1"><span>执子之手</span></li>
			<li data-type='3'  data-var='钱塘江'   data-xt="0"><span>钱塘江</span></li>
			<li data-type='3'  data-var='燕赵风云'   data-xt="0"><span>燕赵风云</span></li>
			<li data-type='3'  data-var='城隍庙'   data-xt="0"><span>城隍庙</span></li>
			<li data-type='3'  data-var='钓鱼岛'   data-xt="0"><span>钓鱼岛</span></li>
			<li data-type='3'  data-var='碧落星空'   data-xt="1"><span>碧落星空</span></li>
			<li data-type='3'  data-var='暮雨朝云'   data-xt="1"><span>暮雨朝云</span></li>
			<li data-type='3'  data-var='香蜜湖'   data-xt="0"><span>香蜜湖</span></li>
			<li data-type='3'  data-var='金榜题名'   data-xt="0"><span>金榜题名</span></li>
			<li data-type='3'  data-var='彩云之南'   data-xt="0"><span>彩云之南</span></li>
			<li data-type='3'  data-var='凌云殿'   data-xt="0"><span>凌云殿</span></li>
			<li data-type='3'  data-var='姑苏城'   data-xt="0"><span>姑苏城</span></li>
			<li data-type='3'  data-var='花开富贵'   data-xt="1"><span>花开富贵</span></li>
			<li data-type='3'  data-var='倾国倾城'   data-xt="1"><span>倾国倾城</span></li>
			<li data-type='3'  data-var='飞砂走石'   data-xt="1"><span>飞砂走石</span></li>
			<li data-type='3'  data-var='万紫千红'   data-xt="1"><span>万紫千红</span></li>
			<li data-type='3'  data-var='龙凤呈祥'   data-xt="1"><span>龙凤呈祥</span></li>
			<li data-type='3'  data-var='仙履奇缘'   data-xt="0"><span>仙履奇缘</span></li>
			<li data-type='3'  data-var='顶天立地'   data-xt="0"><span>顶天立地</span></li>
			<li data-type='3'  data-var='长乐永昌'   data-xt="1"><span>长乐永昌</span></li>
			<li data-type='3'  data-var='前程似锦'   data-xt="1"><span>前程似锦</span></li>
			<li data-type='3'  data-var='紫陌红尘'   data-xt="1"><span>紫陌红尘</span></li>
			<li data-type='3'  data-var='梦想岛'   data-xt="1"><span>梦想岛</span></li>
			<li data-type='3'  data-var='如画如诗'   data-xt="1"><span>如画如诗</span></li>
			<li data-type='3'  data-var='一生所爱'   data-xt="0"><span>一生所爱</span></li>
			<li data-type='3'  data-var='红颜知己'   data-xt="0"><span>红颜知己</span></li>
			<li data-type='3'  data-var='繁花似锦'   data-xt="0"><span>繁花似锦</span></li>
			<li data-type='3'  data-var='开创未来'   data-xt="0"><span>开创未来</span></li>
			<li data-type='3'  data-var='仗剑天涯'   data-xt="0"><span>仗剑天涯</span></li>
			<li data-type='3'  data-var='夏日浓情'   data-xt="1"><span>夏日浓情</span></li>
			<li data-type='3'  data-var='人月两圆'   data-xt="1"><span>人月两圆</span></li>
			<li data-type='3'  data-var='前所未有'   data-xt="1"><span>前所未有</span></li>
			<li data-type='3'  data-var='欢天喜地'   data-xt="1"><span>欢天喜地</span></li>
			<li data-type='3'  data-var='心心相印'   data-xt="1"><span>心心相印</span></li>
			<li data-type='3'  data-var='一起结婚'   data-xt="1"><span>一起结婚</span></li>
			<li data-type='3'  data-var='朝阳鸣凤'   data-xt="0"><span>朝阳鸣凤</span></li>
			<li data-type='3'  data-var='龙飞凤舞'   data-xt="0"><span>龙飞凤舞</span></li>
			<li data-type='3'  data-var='四季平安'   data-xt="0"><span>四季平安</span></li>
			<li data-type='3'  data-var='大唐盛世'   data-xt="0"><span>大唐盛世</span></li>
			<li data-type='3'  data-var='剑歌红尘'   data-xt="1"><span>剑歌红尘</span></li>
			<li data-type='3'  data-var='红尘如梦'   data-xt="1"><span>红尘如梦</span></li>
			<li data-type='3'  data-var='一起幸福'   data-xt="1"><span>一起幸福</span></li>
			<li data-type='2'  data-var='清风自在'   data-xt="0"><span>清风自在</span></li>
			<li data-type='2'  data-var='人间芳菲'   data-xt="0"><span>人间芳菲</span></li>
			<li data-type='2'  data-var='合家团圆'   data-xt="0"><span>合家团圆</span></li>
			<li data-type='2'  data-var='春和景明'   data-xt="0"><span>春和景明</span></li>
			<li data-type='2'  data-var='锦绣山河'   data-xt="0"><span>锦绣山河</span></li>
			<li data-type='2'  data-var='吉星高照'   data-xt="0"><span>吉星高照</span></li>
			<li data-type='2'  data-var='独占鳌头'   data-xt="0"><span>独占鳌头</span></li>
			<li data-type='2'  data-var='童真童趣'   data-xt="0"><span>童真童趣</span></li>
			<li data-type='2'  data-var='如梦如诗'   data-xt="0"><span>如梦如诗</span></li>
			<li data-type='2'  data-var='风和日丽'   data-xt="0"><span>风和日丽</span></li>
			<li data-type='2'  data-var='诗情画意'   data-xt="0"><span>诗情画意</span></li>
			<li data-type='2'  data-var='烟雨斜阳'   data-xt="0"><span>烟雨斜阳</span></li>
			<li data-type='2'  data-var='雪满长空'   data-xt="0"><span>雪满长空</span></li>
			<li data-type='2'  data-var='锦瑟华年'   data-xt="0"><span>锦瑟华年</span></li>
			<li data-type='2'  data-var='王者归来'   data-xt="0"><span>王者归来</span></li>
			<li data-type='2'  data-var='四海欢腾'   data-xt="0"><span>四海欢腾</span></li>
			<li data-type='2'  data-var='暗香疏影'   data-xt="0"><span>暗香疏影</span></li>
			<li data-type='2'  data-var='嫦娥奔月'   data-xt="0"><span>嫦娥奔月</span></li>
			<li data-type='2'  data-var='一笑倾城'   data-xt="0"><span>一笑倾城</span></li>
			<li data-type='2'  data-var='技压群雄'   data-xt="0"><span>技压群雄</span></li>
			<li data-type='2'  data-var='佳人如梦'   data-xt="0"><span>佳人如梦</span></li>
			<li data-type='2'  data-var='招财进宝'   data-xt="0"><span>招财进宝</span></li>
			<li data-type='2'  data-var='气壮山河'   data-xt="0"><span>气壮山河</span></li>
			<li data-type='2'  data-var='情有独钟'   data-xt="0"><span>情有独钟</span></li>
			<li data-type='2'  data-var='龙行天下'   data-xt="0"><span>龙行天下</span></li>
			<li data-type='2'  data-var='一起恋爱'   data-xt="0"><span>一起恋爱</span></li>
			<li data-type='2'  data-var='天下风云'   data-xt="0"><span>天下风云</span></li>
			<li data-type='2'  data-var='以梦为马'   data-xt="0"><span>以梦为马</span></li>
			<li data-type='2'  data-var='酒意诗情'   data-xt="0"><span>酒意诗情</span></li>
			<li data-type='2'  data-var='骑幻冒险'   data-xt="0"><span>骑幻冒险</span></li>
			<li data-type='2'  data-var='名扬万里'   data-xt="0"><span>名扬万里</span></li>
			<li data-type='2'  data-var='桃花依旧'   data-xt="0"><span>桃花依旧</span></li>
			<li data-type='2'  data-var='天下归心'   data-xt="0"><span>天下归心</span></li>
			<li data-type='4'  data-var='海棠迎风'   data-xt="2"><span>海棠迎风</span></li>
			<li data-type='4'  data-var='明河星舟'   data-xt="2"><span>明河星舟</span></li>
			<li data-type='4'  data-var='2018'   data-xt="2"><span>2018</span></li>
			<li data-type='4'  data-var='时空之隙'   data-xt="2"><span>时空之隙</span></li>
			<li data-type='4'  data-var='满堂花醉'   data-xt="2"><span>满堂花醉</span></li>
			<li data-type='4'  data-var='灿烂千阳'   data-xt="2"><span>灿烂千阳</span></li>
			<li data-type='4'  data-var='因梦而在'   data-xt="2"><span>因梦而在</span></li>
			<li data-type='4'  data-var='华灯结彩'   data-xt="2"><span>华灯结彩</span></li>
			<li data-type='4'  data-var='如意新春'   data-xt="2"><span>如意新春</span></li>
			<li data-type='4'  data-var='旺福迎春'   data-xt="2"><span>旺福迎春</span></li>
			<li data-type='4'  data-var='双面伊人'   data-xt="2"><span>双面伊人</span></li>
			<li data-type='4'  data-var='两心相知'   data-xt="2"><span>两心相知</span></li>
			<li data-type='4'  data-var='十年一梦'   data-xt="2"><span>十年一梦</span></li>
			<li data-type='4'  data-var='愿闻花名'   data-xt="2"><span>愿闻花名</span></li>
			<li data-type='4'  data-var='河洛天工'   data-xt="2"><span>河洛天工</span></li>
			<li data-type='4'  data-var='洛阳匠心'   data-xt="2"><span>洛阳匠心</span></li>
			<li data-type='4'  data-var='流萤灯'   data-xt="2"><span>流萤灯</span></li>
			<li data-type='4'  data-var='风起之时'   data-xt="2"><span>风起之时</span></li>
			<li data-type='4'  data-var='落花清寒'   data-xt="2"><span>落花清寒</span></li>
			<li data-type='4'  data-var='少年无畏'   data-xt="2"><span>少年无畏</span></li>
			<li data-type='4'  data-var='风之痕'   data-xt="2"><span>风之痕</span></li>
			<li data-type='4'  data-var='秋声赋'   data-xt="2"><span>秋声赋</span></li>
			<li data-type='4'  data-var='一战倾城'   data-xt="2"><span>一战倾城</span></li>
			<li data-type='4'  data-var='逍遥游'   data-xt="2"><span>逍遥游</span></li>
			<li data-type='4'  data-var='四海九州'   data-xt="2"><span>四海九州</span></li>
			<li data-type='4'  data-var='此生不换'   data-xt="2"><span>此生不换</span></li>
			<li data-type='4'  data-var='海之彼端'   data-xt="2"><span>海之彼端</span></li>
			<li data-type='4'  data-var='风样自由'   data-xt="2"><span>风样自由</span></li>
			<li data-type='4'  data-var='相见恨晚'   data-xt="2"><span>相见恨晚</span></li>
			<li data-type='4'  data-var='三生情缘'   data-xt="2"><span>三生情缘</span></li>
			<li data-type='4'  data-var='对月歌'   data-xt="2"><span>对月歌</span></li>
			<li data-type='4'  data-var='皓月千里'   data-xt="2"><span>皓月千里</span></li>
			<li data-type='4'  data-var='幸福群像'   data-xt="2"><span>幸福群像</span></li>
			<li data-type='4'  data-var='那时花开'   data-xt="2"><span>那时花开</span></li>
			<li data-type='4'  data-var='致青春'   data-xt="2"><span>致青春</span></li>
			<li data-type='4'  data-var='夏日香气'   data-xt="2"><span>夏日香气</span></li>
			<li data-type='4'  data-var='携手逐梦'   data-xt="2"><span>携手逐梦</span></li>
			<li data-type='4'  data-var='心意相通'   data-xt="2"><span>心意相通</span></li>
			<li data-type='4'  data-var='咕噜咕噜'   data-xt="2"><span>咕噜咕噜</span></li>
			<li data-type='4'  data-var='冬日恋曲'   data-xt="2"><span>冬日恋曲</span></li>
			<li data-type='4'  data-var='似水年华'   data-xt="2"><span>似水年华</span></li>
			<li data-type='4'  data-var='雪之歌'   data-xt="2"><span>雪之歌</span></li>
			<li data-type='4'  data-var='琉璃城'   data-xt="2"><span>琉璃城</span></li>
			<li data-type='1'  data-var='混服'   data-xt="1"><span>混服</span></li>
			<div class="cb"></div>
		</ul>
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
					echo '<td class="orange">';
						echo $e->os . ' | ';
						echo District::findOne($e->district)->big . ' | ';
						echo District::findOne($e->district)->name . ' | ';
						echo School::findOne($e->school)->name . ' | ';
						echo $e->bind;
					echo '</td>';
				echo '</tr>';
				echo '<tr class="last-tr">';
					echo '<td>';
					echo '<span class="orange">￥'. $e->price . '.00</span>';
					echo "</td>";
				echo "</tr>\n";
			}
			echo '</table>';
			echo LinkPager::widget(['pagination' => $pagination,]);
		}
		?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".ul1 li").click(function(){
			alert($(this).name);
		});
	});
</script>

<script type="text/javascript">//显示灰色 jQuery 遮罩层

	/* 筛选菜单遮罩 */
	function showMask1() {
        $("#filter-div1").css('display', 'block');
        show();
	}
	function showMask2() {
	    $("#filter-div2").css('display', 'block');
        show();
	}
	function showMask3() {
	    $("#filter-div3").css('display', 'block');
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