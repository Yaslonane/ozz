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
            <input type="hidden" name="id_album">
            <div class="form-group">
                <label class="col-sm-2 control-label">Название альбома</label>
                <div class="col-sm-6"><input type="text" class="form-control" name="name" value="<?php ?>"></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Описание альбома</label>
                <div class="col-sm-6"><textarea name="description" class="form-control" rows="6"><?php ?></textarea></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Опубликован</label>
                    <div class="col-sm-6">
                        <select class="form-control m-bot15" name="is_publication">
                            <option value="1" <?php if($service['is_publication'] == 1):?> selected <?php endif; ?>>Опубликован</option>
                            <option value="0" <?php if($service['is_publication'] == 0):?> selected <?php endif; ?>>Снят с публикации</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Автор</label>
                <div class="col-sm-6"><input type="text" class="form-control" name="autor" value="<?php ?>"></div>
            </div>
            Добавьте изображения в альбом:
            <div class="form-group">
                <div id="parentId" class="col-sm-10">
                <div>
                  <input name="url[1]" type="text" readonly="readonly" value="Click here to browse the server" onclick="openKCFinder(this)" style="width:600px;cursor:pointer" />
                  <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
                  <a style="color:green;" onclick="return addField()" href="#">[+]</a></nobr>
                </div>
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
 div.innerHTML = "<nobr><input name=\"url[" + curFieldNameId + "]\" type=\"text\" readonly=\"readonly\" value=\"Click here to browse the server\" onclick=\"openKCFinder(this)\" style=\"width:600px;cursor:pointer\" /> <a style=\"color:red;\" onclick=\"return deleteField(this)\" href=\"#\">[—]</a> <a style=\"color:green;\" onclick=\"return addField()\" href=\"#\">[+]</a></nobr>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("parentId").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
</script>

<?php require_once 'footer.php'; //подключаем header?> 
        

iv id="parentId">
  <div>
    <nobr><input name="name[1]" type="text" style="width:300px;" />
    <select size="1" name="type[1]" style="width:150px;">
      <option value="text">Текстовое поле</option>
      <option value="int">Целое число</option>
      <option value="float">Число-цена</option>
    </select>
    <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
    <input name="url[1]" type="text" style="width:300px;" />
    <a style="color:green;" onclick="return addField()" href="#">[+]</a></nobr>
  </div>
</div>

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
 div.innerHTML = "<nobr><input name=\"name[" + curFieldNameId + "]\" type=\"text\" style=\"width:300px;\" /> <select size=\"1\" name=\"type[" + curFieldNameId + "]\" style=\"width:150px;\"><option value=\"text\">Текстовое поле</option><option value=\"int\">Целое число</option><option value=\"float\">Число-цена</option></select> <a style=\"color:red;\" onclick=\"return deleteField(this)\" href=\"#\">[—]</a> <input name=\"url[" + curFieldNameId + "]\" type=\"text\" style=\"width:300px;\" /> <a style=\"color:green;\" onclick=\"return addField()\" href=\"#\">[+]</a></nobr>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("parentId").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
</script>