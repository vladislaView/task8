<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if($arParams["IBLOCK_TYPE"] == '')
	$arParams["IBLOCK_TYPE"] = "Info";
$arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
$arResult["ITEMS"] = array();
$arResult["ELEMENTS"] = array();
/*
$rs = CIBlockElement::GetList(
   false, 
   array(
   "IBLOCK_ID" => $arParams["IBLOCK_ID"],
   ),
   false, 
   false,
   false,
);
*/
$rs = \CIBlockElement::GetList(
            [],
            [
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            ]
        );
while ($row = $rs ->Fetch())
	{
		$id = (int)$row['ID'];
		$arResult["ITEMS"][$id] = $row;
		$arResult["ELEMENTS"][] = $id;
	}
unset($row);

	if (!empty($arResult['ITEMS']))
	{
		$elementFilter = array(
			"IBLOCK_ID" => $arResult["ID"],
			"ID" => $arResult["ELEMENTS"]
		);
	}
$this->IncludeComponentTemplate();




?>