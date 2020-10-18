<?php
  //$_FILES['inputfile']['tmp_name']
  var_dump($_FILES);

?>

<form method="post" enctype="multipart/form-data">
<div class="fileform">
<input type="file" id="inputfile" name="inputfile" value="Выбрать файл">
<input type="submit" id="input_button" value="Загрузить" name="send">
</div>
</form>
