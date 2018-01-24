<?php require_once 'header.php'; //подключаем header?> 
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
    z-index: 9999;
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
     <!--body wrapper start-->
    <section class="panel">
        <header class="panel-heading">
            Редактирование отзыва 
        </header>
        <div class="panel-body">
        <div class="wrapper">
        <div class="row">
            <form action="" class="form-horizontal adminex-form" enctype="multipart/form-data" method="post">
            <div  class="col-sm-4">
                <div class="form-group" >
                    <?php if(empty($review['img'])): ?>
                        <img src="<?php echo DOMAIN; ?>/images/content/service-01.jpg" "/>
                    <?php else: ?>
                        <img width="300 px" src="<?php echo $review['img']; ?>"/>
                    <?php endif; ?>
                </div>
                    <input type="hidden" name="id" value="<?php echo $review['id'] ?>"/>
                    
                    <div class="form-group" >
                        <input class="form-control" name="img" type="text" readonly="readonly" placeholder="Click here to browse the server" value="<?php echo $review['img'] ?>" onclick="openKCFinder(this)" style="cursor:pointer" />
                    </div>
                    <div id="kcfinder_div"></div>
                
            </div>
            
            
<div class="col-sm-8">                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Автор(ы) отзыва</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="name" value="<?php echo $review['name']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Опубликован</label>
                            <div class="col-sm-10">
                                <select class="form-control m-bot15" name="is_publication">
                                    <option value="1" <?php if($review['is_publication'] == 1):?> selected <?php endif; ?>>Опубликован</option>
                                    <option value="0" <?php if($review['is_publication'] == 0):?> selected <?php endif; ?>>Снят с публикации</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Дата</label>
                        <div class="col-sm-10 col-xs-11">
                            <input class="form-control form-control-inline input-medium default-date-picker" name="date" size="16" type="text" value="<?php echo date("m-d-Y", $review['date']); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Локация</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="location" value="<?php echo $review['location']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Менроприятие</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="event" value="<?php echo $review['event']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">VK</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="vk" value="<?php echo $review['vk']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Одноклассники</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="odnoklassniki" value="<?php echo $review['odnoklassniki']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Электронная почта</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="email" value="<?php echo $review['email']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Номер телефона</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="phone" value="<?php echo $review['phone']?>"></div>
                    </div>

 </div>
            <div class="col-sm-12">  
                    <div class="form-group">
                        <hr>
                        <label class="control-label">Текст</label>
                        <div>
                            <textarea id="editor1" name="text" class="form-control" rows="100"><?php echo $review['text']?></textarea>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor1',{'filebrowserBrowseUrl':'<?php echo LIB ?>kcfinder/browse.php?type=files',
                            'filebrowserImageBrowseUrl':'<?php echo LIB ?>kcfinder/browse.php?type=images',
                            'filebrowserFlashBrowseUrl':'<?php echo LIB ?>kcfinder/browse.php?type=flash',
                            'filebrowserUploadUrl':'<?php echo LIB ?>kcfinder/upload.php?type=files',
                            'filebrowserImageUploadUrl':'<?php echo LIB ?>kcfinder/upload.php?type=images',
                            'filebrowserFlashUploadUrl':'<?php echo LIB ?>kcfinder/upload.php?type=flash'} );
                        </script>
                    </div>

                    <button class="btn btn-primary" type="submit" name="save">Сохранить</button>
            </div>    
            </form>
        

        </div>
        </div>
        </div>
    </section>

<?php require_once 'footer.php'; //подключаем header?> 
        