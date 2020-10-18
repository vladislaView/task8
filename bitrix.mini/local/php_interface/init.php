<?

/*
AddEventHandler("iblock","OnBeforeIBlockElementAdd",Array("IblockMyHadler","addLog"));
AddEventHandler("iblock","OnBeforeIBlockElementUpdate",Array("IblockMyHadler","addLog"));
*/
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "OnAfterIBlockElementHandler"));

class MyClass
{
    // создаем обработчик события "OnAfterIBlockElementHandler"
    function OnAfterIBlockElementHandler(&$arFields)
    {
		
             
    }
    
}
?>
