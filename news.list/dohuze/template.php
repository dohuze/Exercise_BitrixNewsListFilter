<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetTitle("Новости компании");
?>

<div class="news-list" id="NewsList">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<dl class="block-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
			<dt><?=$arItem["DISPLAY_ACTIVE_FROM"]?></dt>
			<dd><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PREVIEW_TEXT"]?></a></dd>
	<?endforeach;?>
	</dl>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>

<script>
	function SendAjax(date) {
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "<?=$templateFolder?>/handler.php" , true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("date=" + date);
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4) {
				if(xhr.status == 200) {
					//alert(xhr.responseText);
					NewsList.innerHTML = xhr.responseText;
				}
			}
		}
	}
</script>