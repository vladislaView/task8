<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// передать OAuth-токен зарегистрированного приложения.
require "vendor/autoload.php";
$disk = new Arhitector\Yandex\Disk('AgAAAABHVceOAAanTFL2YlFA8EPhuIBwD9HyA6E');

$collection = $disk->getResources();
$src = $collection->getFirst()->get("preview");
$APPLICATION->showCSS();
/*
// если передан дескриптор файла, загрузка с перезаписью
$fp = fopen(__DIR__.'/файл.txt', 'rb');
$resource->upload($fp, true);
*/
?>
<div class="news-list">
<?foreach($collection as $item):?>
    <?$src = $item->get("preview")?>
	<div class="news-item">
    <a href="<?=$src?>">
				<img
						border="0"
                        href = "<?=$src?>"
						src="<?=$src?>"
						/>
	</a>	
			<div>
                <?=$item->get("name");?>
            </div>
    
			<div style="clear:both"></div>
		
	</div>
<?endforeach;?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>