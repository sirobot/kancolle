<!DOCTYPE html>
<html>

<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="http://dunkel.halfmoon.jp/kancolle/" />
<title>艦娘所有一覧</title>

<link rel="stylesheet" type="text/css" href="flat-ui/jquery.mobile.flatui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

<link href="kan_style.css" rel="stylesheet" type="text/css">
<link href="image-picker/image-picker.css" rel="stylesheet" type="text/css">
<script src="image-picker/image-picker.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	// imagePicker初期化
	$(".musu").imagepicker({hide_select: true, show_label: true});
	// 全選択
	$('#chkAll,#chkAll_b').click(function(){
		$('#mususelect option').each(function() {
			$(this).attr('selected', 'selected');
		});
		$('ul.thumbnails li div.thumbnail').addClass('selected');
	});
	// 全選択解除
	$('#chkReset,#chkReset_b').click(function(){
		$('#mususelect option').each(function() {
			$(this).removeAttr('selected');
		});
		$('ul.thumbnails li div.thumbnail').removeClass('selected');
	});
	// フォーム送信データ作成
	$("form").submit(function(){
		var formVal = $('#form1 #mususelect').val();
		$('#form1 #mususelect').val(null);
		$('#form1 #musuList').val(formVal);
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
<form action="result.php" method="get" data-ajax="false" name="form1" id="form1">
<input type="hidden" id="musuList" name="musuList" value="">
<button id="chkAll" data-icon="flat-checkround" data-theme="f" data-inline="true" type="button">すべて選択</button>
<button id="chkReset" data-icon="flat-cross" data-theme="f" data-inline="true" type="reset">選択リセット</button>
<input data-theme="d" data-inline="true" type="submit" value="作成！">
<?php
	$path = "/home/vage/pear/PEAR/";
	set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	require_once "../../siro_common/php/db_common.php";
	
	// DBから艦娘のデータを取得
	$db_conn = db_conn();
	if($db_conn !== false){
		$query = mysql_query("select * from kancolle_charaList order by number");
		// selectタグの出力
		echo '<select id="mususelect" multiple="multiple" class="musu" data-role="none" name="m[]">';
		while($musu = mysql_fetch_object($query)){
			echo "\t<option data-img-src='image/" . $musu->number . ".jpg' value='" . $musu->number . "'>No." . $musu->number . " " . $musu->shipType . " " . $musu->name . "</option>\n";
		}
		echo '</select>';
		mysql_close($db_conn);
	}
?>
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
