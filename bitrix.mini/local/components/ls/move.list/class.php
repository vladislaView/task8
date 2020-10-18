<?

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\Date;


if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class CIblockList extends CBitrixComponent{
		
		protected $errors = array();
		
		public function onPrepareComponentParams($arParams)
		{
        $arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
		$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
		if($arParams["IBLOCK_TYPE"] == '')
			$arParams["IBLOCK_TYPE"] = "Info";
		$arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
		return $arParams;
		}
		
		
		
		public function executeComponent()
		{	
			try
			{
			$this->checkModules();		
			$this->getResult();
			$this->includeComponentTemplate();
			
			}catch (SystemException $e)
			{
				ShowError($e->getMessage());
			}
			
		}
			
			
		protected function getResult(){
        if ($this->errors)
            throw new SystemException(current($this->errors));
        $arParams = $this->arParams;
        if ($this->startResultCache($arParams['CACHE_TIME'], $additionalCacheID)) {
            $rs = \CIBlockElement::GetList([],["IBLOCK_ID" => $arParams["IBLOCK_ID"],]);
			
			while ($row = $rs ->Fetch())
			{
				$id = (int)$row['ID'];
				$arResult["ITEMS"][$id] = $row;
				$arResult["ELEMENTS"][] = $id;
			}
			unset($row);

            $this->arResult = $arResult;

        }
		
		}	
		protected function checkModules()
		{
        if (!Loader::includeModule('iblock'))
            throw new SystemException(Loc::getMessage('CPS_MODULE_NOT_INSTALLED', array('#NAME#' => 'iblock')));
		}
		
}

?>