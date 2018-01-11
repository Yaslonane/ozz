<?php require_once 'header.php'; //подключаем header?> 

     <!--body wrapper start-->
    <section class="panel">
        <header class="panel-heading">
            Редактирование альбома
        </header>
        <div class="panel-body">
        <div class="wrapper">
        <div class="row">
           <style type="text/css">
#kcfinder_div {
    display: none;
    position: absolute;
    width: 670px;
    height: 400px;
    background: #e0dfde;
    border: 2px solid #3687e2;
    border-radius: 6px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    padding: 1px;
}
</style>
 
<script type="text/javascript">
function openKCFinder(field) {
    var div = document.getElementById('kcfinder_div');
    if (div.style.display == "block") {
        div.style.display = 'none';
        div.innerHTML = '';
        return;
    }
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            field.value = url;
            div.style.display = 'none';
            div.innerHTML = '';
        }
    };
    div.innerHTML = '<iframe name="kcfinder_iframe" src="<?php echo LIB ?>kcfinder/browse.php?type=files&dir=files/public" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
    div.style.display = 'block';
}
</script>
        <form action="" class="form-horizontal adminex-form" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id_album" value="<?php echo $album['id'] ?>">
            <div class="form-group">
                <label class="col-sm-2 control-label">Название альбома</label>
                <div class="col-sm-6"><input type="text" class="form-control" name="name" value="<?php echo $album['name'] ?>"></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Описание альбома</label>
                <div class="col-sm-6"><textarea name="description" class="form-control" rows="6"><?php echo $album['description'] ?></textarea></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Опубликован</label>
                    <div class="col-sm-6">
                        <select class="form-control m-bot15" name="is_publication">
                            <option value="1" <?php if($album['is_publication'] == 1):?> selected <?php endif; ?>>Опубликован</option>
                            <option value="0" <?php if($album['is_publication'] == 0):?> selected <?php endif; ?>>Снят с публикации</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Автор</label>
                <div class="col-sm-6"><input type="text" class="form-control" name="autor" value="<?php echo $album['autor'] ?>"></div>
            </div>
            Добавьте изображения в альбом:
            <div class="form-group">
                <div id="parentId" class="col-sm-10">
                    <?php if(count($album['imgs']) == 0): ?>
                        <div>
                            <nobr><input name="description_url[]" type="text" placeholder="Don't text"> <input name="url[]" type="text" readonly="readonly" placeholder="Click here to browse the server" onclick="openKCFinder(this)" style="width:600px;cursor:pointer" />
                          <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
                          <a style="color:green;" onclick="return addField()" href="#">[+]</a></nobr>
                        </div>
                    <?php else: ?>
                    <?php for($i = 0; count($album['imgs']) > $i; $i++): ?>
                        <div>
                            <nobr>
                                <input name="description_url[]" type="text" <?php echo "value='".$album['imgs'][$i]['description']."'"; ?>"> <input name="url[]" type="text" readonly="readonly" <?php echo " value='".$album['imgs'][$i]['link']."'"; ?>" onclick="openKCFinder(this)" style="width:600px;cursor:pointer" />
                                <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
                                <a style="color:green;" onclick="return addField()" href="#">[+]</a>
                            </nobr>
                        </div>
                    <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div id="kcfinder_div"></div>
            <button class="btn btn-primary" type="submit" name="save">Сохранить</button>
        </form>
        
        </div>
        </div>
        </div>
    </section>

<script>
var countOfFields = 1; // Текущее число полей
var curFieldNameId = 1; // Уникальное значение для атрибута name
var maxFieldLimit = 25; // Максимальное число возможных полей
function deleteField(a) {
  if (countOfFields > 1)
  {
 // Получаем доступ к ДИВу, содержащему поле
 var contDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 contDiv.parentNode.removeChild(contDiv);
 // Уменьшаем значение текущего числа полей
 countOfFields--;
 }
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
function addField() {
 // Проверяем, не достигло ли число полей максимума
 if (countOfFields >= maxFieldLimit) {
 alert("Число полей достигло своего максимума = " + maxFieldLimit);
 return false;
 }
 // Увеличиваем текущее значение числа полей
 countOfFields++;
 // Увеличиваем ID
 curFieldNameId++;
 // Создаем элемент ДИВ
 var div = document.createElement("div");
 // Добавляем HTML-контент с пом. свойства innerHTML
 div.innerHTML = "<nobr><input name=\"description_url[]\" type=\"text\" placeholder=\"Don't text\"> <input name=\"url[]\" type=\"text\" readonly=\"readonly\" placeholder=\"Click here to browse the server\" onclick=\"openKCFinder(this)\" style=\"width:600px;cursor:pointer\" /> <a style=\"color:red;\" onclick=\"return deleteField(this)\" href=\"#\">[—]</a> <a style=\"color:green;\" onclick=\"return addField()\" href=\"#\">[+]</a></nobr>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("parentId").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
</script>

<?php require_once 'footer.php'; //подключаем header?> 
        

