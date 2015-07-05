<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="canonical" href="http://dunkel.halfmoon.jp/kancolle/"" />
        <title>艦娘所有一覧</title>
		<link rel="stylesheet" href="themes/kan_jquery.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<link href="kan_style.css" rel="stylesheet" type="text/css">
		<link href="image-picker/image-picker.css" rel="stylesheet" type="text/css">
		<script src="image-picker/image-picker.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				// 刀剣男士所有一覧のソースをベースに全面改修
				// 既存互換は廃止

				// 入力(POST)読み込み
				var presetList = $('#presetList').val();
				if (presetList !== '') {
					var presetListArray = presetList.split(',');
					$('#kancolleselect option').filter(function() {
						return jQuery.inArray($(this).val(), presetListArray) != -1;
					}).attr('selected', 'selected');
				}
				// imagePicker初期化
				$(".kancolle").imagepicker({hide_select: true, show_label: true});
				// 全選択
				$('#chkAll,#chkAll_b').click(function() {
					$('#kancolleselect option').each(function() {
						$(this).attr('selected', 'selected');
					});
					$('ul.thumbnails li div.thumbnail').addClass('selected');
				});
				// 全選択解除
				$('#chkReset,#chkReset_b').click(function() {
					$('#kancolleselect option').each(function() {
						$(this).removeAttr('selected');
					});
					$('ul.thumbnails li div.thumbnail').removeClass('selected');
				});
				// フォーム送信データ作成
				$("form").submit(function() {
					var formValArray = $('#form1 #kancolleselect').val();
					// ['1','7',...]の配列になっている状態のものを01に変換
					// twitterのフォロワーの皆様実装アイディアありがとうございます
					var formVal = [];
					// formVal = {'0','0','0','0','0','0',...'0'}の配列を生成・初期化
					for (var i = 1; i < formValArray[formValArray.length - 1]; i++) {
						formVal[i] = '0';
					}
					// formValArrayの要素を添字に、必要な部分のみ1に上書き
					for (var i = 0; i < formValArray.length; i++) {
						formVal[formValArray[i]] = '1';
					}
					// (ver1.1)5文字ずつ32進数で圧縮
					// 末尾が5文字に満たない場合は0詰め
					console.log('formaVal.length:' + (formVal.length-1));
					for (var i = 0; i < (formVal.length - 1) % 5; i++){
						formVal.push('0');
					}
					var form32Val = '';
					var tempStr = '';
					var tempInt = 0;
					console.log('formaVal.length:' + (formVal.length-1));
					for (var i = 1;	i < formVal.length; i=i+5){
						tempStr = formVal[i] + formVal[i+1] +formVal[i+2] + formVal[i+3] + formVal[i+4];
						console.log('tempStr:' + tempStr);
						tempInt = parseInt(tempStr,2);
						console.log('tempInt:' + tempInt);
						form32Val = form32Val + tempInt.toString(32);
						console.log('form32Val:' + form32Val);
					}
					formVal = formVal.join('');
					$('#form1 #kancolleselect').val(null);
					$('#form1 #kancolleList').val(form32Val);
					console.log('test::');
					console.log(form32Val);
					console.log('::endTest');
				});
			});
		</script>

    </head>
    <body>
		<input type="hidden" id="presetList" name="presetList" value="<?php echo($_POST['presetList']); ?>">
		<div data-role="page">
			<div data-role="header" data-theme="f">
				<h1>艦娘所有一覧</h1>
			</div>
			<div data-role="content">
				<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="info" data-collapsed="false"   data-theme="f">
					<h3>これなに？</h3> 
					<p class="collapsible">艦隊これくしょん～艦これ～の艦娘所有一覧ジェネレーターです。</p>
					<p class="collapsible">持っている艦娘をクリックして選択し、「作成！」ボタンを押すと作成できます。</p>
					<p class="collapsible">最近のブラウザならだいたい動くと思います。</p>
					<br />
					<a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">ツイート</a>
					<script>!function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
							if (!d.getElementById(id)) {
								js = d.createElement(s);
								js.id = id;
								js.src = p + '://platform.twitter.com/widgets.js';
								fjs.parentNode.insertBefore(js, fjs);
							}
						}(document, 'script', 'twitter-wjs');
					</script>
				</div>
				<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="grid" data-collapsed="false"  data-theme="f">
					<h3>艦娘一覧</h3>
					<form action="result.php" method="get" data-ajax="false" name="form1" id="form1">
						<input type="hidden" id="kancolleList" name="kancolleList" value="">
						<input type="hidden" id="ver" name="ver" value="1.1">
						<button id="chkAll" data-icon="check" data-theme="f" data-inline="true" type="button">すべて選択</button>
						<button id="chkReset" data-icon="delete" data-theme="f" data-inline="true" type="reset">選択リセット</button>
						<input data-theme="c" data-inline="true" type="submit" value="作成">
						<?php
						$path = "/home/vage/pear/PEAR/";
						set_include_path(get_include_path() . PATH_SEPARATOR . $path);
						require_once "../../siro_common/php/db_common.php";

						// DBから艦娘のデータを取得
						$db_conn = db_conn();
						if ($db_conn !== false) {
							$query = mysql_query("select * from kancolle_charaList where shipType is not null order by number");
							// selectタグの出力
							echo '<select id="kancolleselect" multiple="multiple" class="kancolle" data-role="none" name="m[]">';
							while ($kancolle = mysql_fetch_object($query)) {
								echo "\t<option data-img-src='image/" . $kancolle->number . ".jpg' value='" . ltrim($kancolle->number,"0") . "'>No." . $kancolle->number . " " . $kancolle->name . "</option>\n";
							}
							echo '</select>';
							mysql_close($db_conn);
						}
						?>
						<button id="chkAll_b" data-icon="check" data-theme="f" data-inline="true" type="button">すべて選択</button>
						<button id="chkReset_b" data-icon="delete" data-theme="f" data-inline="true" type="reset">選択リセット</button>
						<input data-theme="c" data-inline="true" type="submit" value="作成">
					</form>
				</div>
				<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="mail" data-collapsed="true"  data-theme="f">
					<h3>他</h3>
					<p class="collapsible">何か不具合等ありましたらご連絡ください。</p>
					<p class="collapsible">作成：siro Twitter:@siro_xx</p>
				</div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- kancolle -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:90px"
				     data-ad-client="ca-pub-1725571372992163"
				     data-ad-slot="2774351136"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>

    </body>
</html>
