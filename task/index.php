<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// передать OAuth-токен зарегистрированного приложения.
require "vendor/autoload.php";
$disk = new Arhitector\Yandex\Disk('AgAAAABHVceOAAanTFL2YlFA8EPhuIBwD9HyA6E');

$collection = $disk->getResources();

if(array_key_exists('inputfile',$_FILES)){
    AddNewFileInDisc();
}
if(array_key_exists('delete',$_POST)){
    echo "you delete file? ".$_POST["delete"];
    DeleteFileInDisc($_POST["delete"]);
    die();
}
function AddNewFileInDisc(){
	var_dump($_FILES['inputfile']['tmp_name']);
    $diskAdd = new Arhitector\Yandex\Disk('AgAAAABHVceOAAanTFL2YlFA8EPhuIBwD9HyA6E');
    $addedFile = $diskAdd->getResource($_FILES['inputfile']['tmp_name']);
    $addedFile->upload($_FILES['inputfile']['tmp_name']);
	echo "Файл добавлен: ".$_FILES['inputfile']['name'];
	unset($_FILES);
	unset($_POST);
	
};
function DeleteFileInDisc($resource){
    $diskDelete = new Arhitector\Yandex\Disk('AgAAAABHVceOAAanTFL2YlFA8EPhuIBwD9HyA6E');
    $deleteFile = $diskDelete->getResource($resource);

// проверить сущестует такой файл на диске ?
    if($deleteFile->has()){
        echo "файл найден и удален";
        $removed = $deleteFile->delete();
	}
	unset($resource);
};
?>
<form method="post" enctype="multipart/form-data">
<input type="file" id="inputfile" name="inputfile" value="Выбрать файл">
<input type="submit" id="input_button" value="Загрузить" name="send">

<br>
<div class="news-list">
</div>

<br>
<?foreach($collection as $item):?>
    <?$src = $item->get("preview",false)?>
	<div class="news-item">
    <? if(count($src)):?>
    <a href="<?=$src?>">
				<img
						border="0"
                        href = "<?=$src?>"
						src="<?=$src?>"
						/>
    </a>
    <?endif;?>	        
                <?=$item->get("name");?><br>
    <form method="post">
    <input type = "text" name = "delete" value ="<?=$item->get("name");?>" hidden />
    <input type="submit" name = "make"  value="Удалить">
    </form>
			<div style="clear:both"></div>
            
	</div>

<?endforeach;?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>