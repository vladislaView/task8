<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="information-block"> 	 	 
	<div class="information-block-head">Автокеширование</div>
	Обратите внимание: по умолчанию кеширование данных <b>включено</b>. Автокеширование позволяет значительно ускорить работу демо-сайта. Изменить настройки кеширования данных на сайте можно на специальной <a href="/bitrix/admin/cache.php">странице</a>.
</div>

<div class="information-block">
<div class="information-block-head">Группы клуба</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.group_top",
	"",
	Array(
		"GROUP_VAR" => "group_id", 
		"PATH_TO_GROUP" => "/club/group/#group_id#/", 
		"PATH_TO_GROUP_SEARCH" => "/club/group/search/", 
		"ITEMS_COUNT" => "4", 
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s", 
		"DISPLAY_IMAGE" => "Y", 
		"DISPLAY_DESCRIPTION" => "N", 
		"DISPLAY_NUMBER_OF_MEMBERS" => "Y", 
		"DISPLAY_SUBJECT" => "Y", 
		"CACHE_TIME" => "180" 
	)
);?>
</div>

<div class="information-block">
  <div class="information-block-head">Опрос</div>
 	<?$APPLICATION->IncludeComponent(
	"bitrix:voting.current",
	"main_page",
	Array(
		"CHANNEL_SID" => "ANKETA",
		"CACHE_TYPE"	=>	"A",
		"CACHE_TIME"	=>	"3600",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
	)
);?> </div>

<!--PHOTO_RANDOM-->