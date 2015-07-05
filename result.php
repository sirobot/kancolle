<!DOCTYPE html>
<html>

	<head>
		<meta content="ja" http-equiv="Content-Language">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta name="viewport" content="width=device-width, initial-scale=1">

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
				$('#flip_noncollect').click(function() {
					if ($('#flip_noncollect').is(':checked')) {
						// 未所持艦娘の表示
						$(".noncollect").show();
					} else {
						// 未所持艦娘の非表示
						$(".noncollect").hide();
					}
				});
				$('#flip_unimpl').click(function() {
					if ($('#flip_unimpl').is(':checked')) {
						// 未実装艦娘の表示
						$(".unimpl").show();
					} else {
						// 未実装艦娘の非表示
						$(".unimpl").hide();
					}
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
				<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="info" data-collapsed="false"  data-theme="f">
					<h3>メニュー</h3>
					<?php
					$path = "/home/vage/pear/PEAR/";
					set_include_path(get_include_path() . PATH_SEPARATOR . $path);
					require_once "../../siro_common/php/db_common.php";

					// GETで回収
					if ($_GET['kancolleList'] == "") {
						$form_kancolleList = array();
						$selectedkancolleCount = 0;
						$presetList = '';
					} else {
						// ver1.1(32進数圧縮)対応
						if((float)$_GET['ver'] >= 1.1){
							// 圧縮された文字列を01列に戻す
							$temp_kancolleList32 = str_split($_GET['kancolleList']);
							$temp_kancolleList = array();
							foreach($temp_kancolleList32 as $base32){
								$temp_str = str_pad(base_convert($base32, 32, 2),5,'0',STR_PAD_LEFT);
								$temp_kancolleList = array_merge($temp_kancolleList,str_split($temp_str));
							}
						}else{
							$temp_kancolleList = str_split($_GET['kancolleList']);							
						}
						$form_kancolleList = array();
						foreach ($temp_kancolleList as $key => $val) {
							if ($val === '1') {
								$form_kancolleList[] = $key + 1;  // 添字を1からにする
							}
						}
						$selectedkancolleCount = count($form_kancolleList);
						$presetList = implode(',', $form_kancolleList);
						$form_kancolleList[] = '0'; // ダミーデータを先頭に挿入し、添字を1からにする
					}
					// DBから艦娘のデータを取得
					$db_conn = db_conn();
					if ($db_conn !== false) {
						$query = mysql_query("select * from kancolle_charaList where shipType is not null order by number");
						$impl_kancolleList = array();
						while ($kancolle = mysql_fetch_object($query)) {
							// 実装済み艦娘Noの配列作成
							$impl_kancolleList[] = $kancolle->number;
						}
						$kancolleCount = count($impl_kancolleList);
						mysql_close($db_conn);
					}

					// 所有率計算
					$collectionRate = floor(($selectedkancolleCount / $kancolleCount) * 100);

					$originalUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
					//$obj = Services_ShortURL::factory('TinyURL');
					//$shortUrl = $obj->shorten($originalUrl);
					//echo '<a href="http://dunkel.halfmoon.jp/kancolle/" data-role="button" data-theme="f" data-inline="true" data-ajax="false">この結果を編集する</a><br />';

					echo '<form action="index.php" method="post" data-ajax="false" name="form1" id="form1">';
					echo '<input type="hidden" id="preset" name="presetList" value="' . $presetList . '">';
					echo '<input data-theme="f" data-inline="true" type="submit" value="この結果を編集する"></form>';

					echo '<div>';
					echo '艦娘所有数 ' . $selectedkancolleCount . '/' . $kancolleCount . ' (所有率' . $collectionRate . '%)';
					echo '</div>';
					echo '<div class="menu">';
					echo '<a href="https://twitter.com/share" class="twitter-share-button" data-text="';
					echo '艦娘所有一覧を作成しました(所有率' . $collectionRate . '%)';
					echo '" data-count="none">Tweet</a>';
					echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
					echo '</div>';
					?>
				</div>
				<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="grid" data-collapsed="false"  data-theme="f">

					<h3>艦娘所有一覧</h3>
					<div class="kancolleleResultList">
						<fieldset data-role="controlgroup" data-type="horizontal">
							<legend>表示切替：</legend>
							<input id="flip_noncollect" name="flip_show" type="checkbox" value="noncollect" />
							<label for="flip_noncollect">未所持艦娘を表示</label>
							<input id="flip_unimpl" name="flip_show" type="checkbox" value="unimpl" />
							<label for="flip_unimpl">未実装艦娘を表示</label>
						</fieldset>
						<?php
						// 出力
						for ($j = 1; $j <= max($impl_kancolleList); $j++) {
							// 「未実装」「実装済未所持」「所持」で表示を切り替える
							if (in_array($j, $form_kancolleList)) {
								// 所持
								echo '<div class="musumeResult">';
								echo '<img src="image/' . sprintf('%03d', $j) . '.jpg" height="150" width="109"></div>';
							} elseif (in_array($j, $impl_kancolleList)) {
								// 実装済未所持
								echo '<div class="musumeResult noncollect" style="display: none">';
								echo '<img src="image/' . sprintf('%03d', $j) . '.jpg" height="150" width="109"></div>';
							} else {
								// 未実装
								echo '<div class="musumeResult unimpl" style="display: none">';
								echo '<img src="image/000.jpg" height="150" width="109"></div>';
							}
						}
						?>
					</div>
				</div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- kancolle_result -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:15px"
				     data-ad-client="ca-pub-1725571372992163"
				     data-ad-slot="2634750330"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</body>

</html>
