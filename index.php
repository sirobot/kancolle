<!DOCTYPE html>
<html>

<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>艦娘所有一覧</title>

<link rel="stylesheet" type="text/css" href="flat-ui/jquery.mobile.flatui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

<link href="kan_style.css" rel="stylesheet" type="text/css">
<link href="image-picker/image-picker.css" rel="stylesheet" type="text/css">
<script src="image-picker/image-picker.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".musu").imagepicker({hide_select: true, show_label: true});
	$('#chkAll,#chkAll_b').click(function(){
		$('#mususelect option').each(function() {
			$(this).attr('selected', 'selected');
		});
		$('ul.thumbnails li div.thumbnail').addClass('selected');
	});
	$('#chkReset,#chkReset_b').click(function(){
		$('#mususelect option').each(function() {
			$(this).removeAttr('selected');
		});
		$('ul.thumbnails li div.thumbnail').removeClass('selected');
	});

});
</script>
</head>

<body>
<div data-role="page">
<div data-role="header" data-theme="f">
<h1>艦娘所有一覧</h1>
</div>
<div data-role="content">
<div data-role="collapsible" data-collapsed-icon="flat-menu" data-expanded-icon="flat-cross" data-collapsed="false"  data-theme="f">
	<h3>これなに？</h3> 
	<p class="collapsible">艦隊これくしょん～艦これ～の艦娘所有一覧ジェネレーターです。</p>
	<p class="collapsible">持っている艦娘をクリックして選択し、「作成！」ボタンを押すと作成できます。</p>
	<p class="collapsible">最近のブラウザならだいたい動くと思います。</p>
</div>
<div data-role="collapsible" data-collapsed-icon="flat-checkround" data-expanded-icon="flat-cross" data-collapsed="false"  data-theme="f">
<h3>艦娘一覧</h3>
<form action="result.php" method="get" data-ajax="false" name="form1">
<button id="chkAll" data-icon="flat-checkround" data-theme="f" data-inline="true" type="button">すべて選択</button>
<button id="chkReset" data-icon="flat-cross" data-theme="f" data-inline="true" type="reset">選択リセット</button>
<input data-theme="d" data-inline="true" type="submit" value="作成！">
<select id="mususelect" multiple="multiple" class="musu" data-role="none" name="m[]">
	<option data-img-src='image/001.jpg' value='001'>No.001 戦艦 長門</option>
	<option data-img-src='image/002.jpg' value='002'>No.002 戦艦 陸奥</option>
	<option data-img-src='image/003.jpg' value='003'>No.003 戦艦 伊勢</option>
	<option data-img-src='image/004.jpg' value='004'>No.004 戦艦 日向</option>
	<option data-img-src='image/005.jpg' value='005'>No.005 駆逐艦 雪風</option>
	<option data-img-src='image/006.jpg' value='006'>No.006 正規空母 赤城</option>
	<option data-img-src='image/007.jpg' value='007'>No.007 正規空母 加賀</option>
	<option data-img-src='image/008.jpg' value='008'>No.008 正規空母 蒼龍</option>
	<option data-img-src='image/009.jpg' value='009'>No.009 正規空母 飛龍</option>
	<option data-img-src='image/010.jpg' value='010'>No.010 駆逐艦 島風</option>
	<option data-img-src='image/011.jpg' value='011'>No.011 駆逐艦 吹雪</option>
	<option data-img-src='image/012.jpg' value='012'>No.012 駆逐艦 白雪</option>
	<option data-img-src='image/013.jpg' value='013'>No.013 駆逐艦 初雪</option>
	<option data-img-src='image/014.jpg' value='014'>No.014 駆逐艦 深雪</option>
	<option data-img-src='image/015.jpg' value='015'>No.015 駆逐艦 叢雲</option>
	<option data-img-src='image/016.jpg' value='016'>No.016 駆逐艦 磯波</option>
	<option data-img-src='image/017.jpg' value='017'>No.017 駆逐艦 綾波</option>
	<option data-img-src='image/018.jpg' value='018'>No.018 駆逐艦 敷波</option>
	<option data-img-src='image/019.jpg' value='019'>No.019 軽巡洋艦 大井</option>
	<option data-img-src='image/020.jpg' value='020'>No.020 軽巡洋艦 北上</option>
	<option data-img-src='image/021.jpg' value='021'>No.021 戦艦 金剛</option>
	<option data-img-src='image/022.jpg' value='022'>No.022 戦艦 比叡</option>
	<option data-img-src='image/023.jpg' value='023'>No.023 戦艦 榛名</option>
	<option data-img-src='image/024.jpg' value='024'>No.024 戦艦 霧島</option>
	<option data-img-src='image/025.jpg' value='025'>No.025 軽空母 鳳翔</option>
	<option data-img-src='image/026.jpg' value='026'>No.026 戦艦 扶桑</option>
	<option data-img-src='image/027.jpg' value='027'>No.027 戦艦 山城</option>
	<option data-img-src='image/028.jpg' value='028'>No.028 軽巡洋艦 天龍</option>
	<option data-img-src='image/029.jpg' value='029'>No.029 軽巡洋艦 龍田</option>
	<option data-img-src='image/030.jpg' value='030'>No.030 軽空母 龍驤</option>
	<option data-img-src='image/031.jpg' value='031'>No.031 駆逐艦 睦月</option>
	<option data-img-src='image/032.jpg' value='032'>No.032 駆逐艦 如月</option>
	<option data-img-src='image/033.jpg' value='033'>No.033 駆逐艦 皐月</option>
	<option data-img-src='image/034.jpg' value='034'>No.034 駆逐艦 文月</option>
	<option data-img-src='image/035.jpg' value='035'>No.035 駆逐艦 長月</option>
	<option data-img-src='image/036.jpg' value='036'>No.036 駆逐艦 菊月</option>
	<option data-img-src='image/037.jpg' value='037'>No.037 駆逐艦 三日月</option>
	<option data-img-src='image/038.jpg' value='038'>No.038 駆逐艦 望月</option>
	<option data-img-src='image/039.jpg' value='039'>No.039 軽巡洋艦 球磨</option>
	<option data-img-src='image/040.jpg' value='040'>No.040 軽巡洋艦 多摩</option>
	<option data-img-src='image/041.jpg' value='041'>No.041 軽巡洋艦 木曾</option>
	<option data-img-src='image/042.jpg' value='042'>No.042 軽巡洋艦 長良</option>
	<option data-img-src='image/043.jpg' value='043'>No.043 軽巡洋艦 五十鈴</option>
	<option data-img-src='image/044.jpg' value='044'>No.044 軽巡洋艦 名取</option>
	<option data-img-src='image/045.jpg' value='045'>No.045 軽巡洋艦 由良</option>
	<option data-img-src='image/046.jpg' value='046'>No.046 軽巡洋艦 川内</option>
	<option data-img-src='image/047.jpg' value='047'>No.047 軽巡洋艦 神通</option>
	<option data-img-src='image/048.jpg' value='048'>No.048 軽巡洋艦 那珂</option>
	<option data-img-src='image/049.jpg' value='049'>No.049 水上機母艦 千歳</option>
	<option data-img-src='image/050.jpg' value='050'>No.050 水上機母艦 千代田</option>
	<option data-img-src='image/051.jpg' value='051'>No.051 重巡洋艦 最上</option>
	<option data-img-src='image/052.jpg' value='052'>No.052 重巡洋艦 古鷹</option>
	<option data-img-src='image/053.jpg' value='053'>No.053 重巡洋艦 加古</option>
	<option data-img-src='image/054.jpg' value='054'>No.054 重巡洋艦 青葉</option>
	<option data-img-src='image/055.jpg' value='055'>No.055 重巡洋艦 妙高</option>
	<option data-img-src='image/056.jpg' value='056'>No.056 重巡洋艦 那智</option>
	<option data-img-src='image/057.jpg' value='057'>No.057 重巡洋艦 足柄</option>
	<option data-img-src='image/058.jpg' value='058'>No.058 重巡洋艦 羽黒</option>
	<option data-img-src='image/059.jpg' value='059'>No.059 重巡洋艦 高雄</option>
	<option data-img-src='image/060.jpg' value='060'>No.060 重巡洋艦 愛宕</option>
	<option data-img-src='image/061.jpg' value='061'>No.061 重巡洋艦 摩耶</option>
	<option data-img-src='image/062.jpg' value='062'>No.062 重巡洋艦 鳥海</option>
	<option data-img-src='image/063.jpg' value='063'>No.063 重巡洋艦 利根</option>
	<option data-img-src='image/064.jpg' value='064'>No.064 重巡洋艦 筑摩</option>
	<option data-img-src='image/065.jpg' value='065'>No.065 軽空母 飛鷹</option>
	<option data-img-src='image/066.jpg' value='066'>No.066 軽空母 隼鷹</option>
	<option data-img-src='image/067.jpg' value='067'>No.067 駆逐艦 朧</option>
	<option data-img-src='image/068.jpg' value='068'>No.068 駆逐艦 曙</option>
	<option data-img-src='image/069.jpg' value='069'>No.069 駆逐艦 漣</option>
	<option data-img-src='image/070.jpg' value='070'>No.070 駆逐艦 潮</option>
	<option data-img-src='image/071.jpg' value='071'>No.071 駆逐艦 暁</option>
	<option data-img-src='image/072.jpg' value='072'>No.072 駆逐艦 響</option>
	<option data-img-src='image/073.jpg' value='073'>No.073 駆逐艦 雷</option>
	<option data-img-src='image/074.jpg' value='074'>No.074 駆逐艦 電</option>
	<option data-img-src='image/075.jpg' value='075'>No.075 駆逐艦 初春</option>
	<option data-img-src='image/076.jpg' value='076'>No.076 駆逐艦 子日</option>
	<option data-img-src='image/077.jpg' value='077'>No.077 駆逐艦 若葉</option>
	<option data-img-src='image/078.jpg' value='078'>No.078 駆逐艦 初霜</option>
	<option data-img-src='image/079.jpg' value='079'>No.079 駆逐艦 白露</option>
	<option data-img-src='image/080.jpg' value='080'>No.080 駆逐艦 時雨</option>
	<option data-img-src='image/081.jpg' value='081'>No.081 駆逐艦 村雨</option>
	<option data-img-src='image/082.jpg' value='082'>No.082 駆逐艦 夕立</option>
	<option data-img-src='image/083.jpg' value='083'>No.083 駆逐艦 五月雨</option>
	<option data-img-src='image/084.jpg' value='084'>No.084 駆逐艦 涼風</option>
	<option data-img-src='image/085.jpg' value='085'>No.085 駆逐艦 朝潮</option>
	<option data-img-src='image/086.jpg' value='086'>No.086 駆逐艦 大潮</option>
	<option data-img-src='image/087.jpg' value='087'>No.087 駆逐艦 満潮</option>
	<option data-img-src='image/088.jpg' value='088'>No.088 駆逐艦 荒潮</option>
	<option data-img-src='image/089.jpg' value='089'>No.089 駆逐艦 霰</option>
	<option data-img-src='image/090.jpg' value='090'>No.090 駆逐艦 霞</option>
	<option data-img-src='image/091.jpg' value='091'>No.091 駆逐艦 陽炎</option>
	<option data-img-src='image/092.jpg' value='092'>No.092 駆逐艦 不知火</option>
	<option data-img-src='image/093.jpg' value='093'>No.093 駆逐艦 黒潮</option>
	<option data-img-src='image/094.jpg' value='094'>No.094 軽空母 祥鳳</option>
	<option data-img-src='image/095.jpg' value='095'>No.095 水上機母艦 千歳改</option>
	<option data-img-src='image/096.jpg' value='096'>No.096 水上機母艦 千代田改</option>
	<option data-img-src='image/097.jpg' value='097'>No.097 重雷装巡洋艦 大井改</option>
	<option data-img-src='image/098.jpg' value='098'>No.098 重雷装巡洋艦 北上改</option>
	<option data-img-src='image/099.jpg' value='099'>No.099 水上機母艦 千歳甲</option>
	<option data-img-src='image/100.jpg' value='100'>No.100 水上機母艦 千代田甲</option>
	<option data-img-src='image/101.jpg' value='101'>No.101 航空巡洋艦 最上改</option>
	<option data-img-src='image/102.jpg' value='102'>No.102 航空戦艦 伊勢改</option>
	<option data-img-src='image/103.jpg' value='103'>No.103 航空戦艦 日向改</option>
	<option data-img-src='image/104.jpg' value='104'>No.104 軽空母 千歳航</option>
	<option data-img-src='image/105.jpg' value='105'>No.105 軽空母 千代田航</option>
	<option data-img-src='image/106.jpg' value='106'>No.106 正規空母 翔鶴</option>
	<option data-img-src='image/107.jpg' value='107'>No.107 正規空母 瑞鶴</option>
	<option data-img-src='image/108.jpg' value='108'>No.108 正規空母 瑞鶴改</option>
	<option data-img-src='image/109.jpg' value='109'>No.109 軽巡洋艦 鬼怒</option>
	<option data-img-src='image/110.jpg' value='110'>No.110 軽巡洋艦 阿武隈</option>
	<option data-img-src='image/111.jpg' value='111'>No.111 軽巡洋艦 夕張</option>
	<option data-img-src='image/112.jpg' value='112'>No.112 軽空母 瑞鳳</option>
	<option data-img-src='image/113.jpg' value='113'>No.113 軽空母 瑞鳳改</option>
	<option data-img-src='image/114.jpg' value='114'>No.114 重雷装巡洋艦 大井改二</option>
	<option data-img-src='image/115.jpg' value='115'>No.115 重雷装巡洋艦 北上改二</option>
	<option data-img-src='image/116.jpg' value='116'>No.116 重巡洋艦 三隈</option>
	<option data-img-src='image/117.jpg' value='117'>No.117 航空巡洋艦 三隈改</option>
	<option data-img-src='image/118.jpg' value='118'>No.118 駆逐艦 初風</option>
	<option data-img-src='image/119.jpg' value='119'>No.119 駆逐艦 舞風</option>
	<option data-img-src='image/120.jpg' value='120'>No.120 重巡洋艦 衣笠</option>
	<option data-img-src='image/121.jpg' value='121'>No.121 軽空母 千歳航改二</option>
	<option data-img-src='image/122.jpg' value='122'>No.122 軽空母 千代田航改二</option>
	<option data-img-src='image/123.jpg' value='123'>No.123 (未実装)</option>
	<option data-img-src='image/124.jpg' value='124'>No.124 重巡洋艦 鈴谷</option>
	<option data-img-src='image/125.jpg' value='125'>No.125 重巡洋艦 熊野</option>
	<option data-img-src='image/126.jpg' value='126'>No.126 潜水艦 伊168</option>
	<option data-img-src='image/127.jpg' value='127'>No.127 潜水艦 伊58</option>
	<option data-img-src='image/128.jpg' value='128'>No.128 (未実装)</option>
	<option data-img-src='image/129.jpg' value='129'>No.129 航空巡洋艦 鈴谷改</option>
	<option data-img-src='image/130.jpg' value='130'>No.130 航空巡洋艦 熊野改</option>
	<option data-img-src='image/131.jpg' value='131'>No.131 戦艦 大和</option>
	<option data-img-src='image/132.jpg' value='132'>No.132 駆逐艦 秋雲</option>
	<option data-img-src='image/133.jpg' value='133'>No.133 駆逐艦 夕雲</option>
	<option data-img-src='image/134.jpg' value='134'>No.134 駆逐艦 巻雲</option>
	<option data-img-src='image/135.jpg' value='135'>No.135 駆逐艦 長波</option>
	<option data-img-src='image/136.jpg' value='136'>No.136 戦艦 大和改</option>
	<option data-img-src='image/137.jpg' value='137'>No.137 (未実装)</option>
	<option data-img-src='image/138.jpg' value='138'>No.138 (未実装)</option>
	<option data-img-src='image/139.jpg' value='139'>No.139 (未実装)</option>
	<option data-img-src='image/140.jpg' value='140'>No.140 (未実装)</option>
	<option data-img-src='image/141.jpg' value='141'>No.141 軽巡洋艦 五十鈴改ニ</option>
	<option data-img-src='image/142.jpg' value='142'>No.142 (未実装)</option>
	<option data-img-src='image/143.jpg' value='143'>No.143 (未実装)</option>
	<option data-img-src='image/144.jpg' value='144'>No.144 駆逐艦 夕立改ニ</option>
	<option data-img-src='image/145.jpg' value='145'>No.145 (未実装)</option>
	<option data-img-src='image/146.jpg' value='146'>No.146 (未実装)</option>
	<option data-img-src='image/147.jpg' value='147'>No.147 駆逐艦 Верный</option>
</select>
<button id="chkAll_b" data-icon="flat-checkround" data-theme="f" data-inline="true" type="button">すべて選択</button>
<button id="chkReset_b" data-icon="flat-cross" data-theme="f" data-inline="true" type="reset">選択リセット</button>
<input data-theme="d" data-inline="true" type="submit" value="作成！">
</form>
</div>
<div data-role="collapsible" data-collapsed-icon="flat-menu" data-expanded-icon="flat-cross" data-collapsed="true"  data-theme="f">
	<h3>他</h3>
	<p class="collapsible">何か不具合等ありましたらご連絡ください。</p>
	<p class="collapsible">作成：yuki(siro) Twitter:@siro_xx</p>
</div>
</div>
</div>
</body>

</html>
