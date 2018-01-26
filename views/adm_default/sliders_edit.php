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
            Редактирование слайдера
        </header>
        <div class="panel-body">
        <div class="wrapper">
            <form action="" class="form-horizontal adminex-form" name="" enctype="multipart/form-data" method="post">
            <?php for($i=0; $i <count($sliders); $i++):?>
            
                <div class="row">
                    <h2>слайдер № <?php echo $sliders[$i]['id'] ?></h2>
                    <div  class="col-sm-offset-1 col-sm-5">
                    <div class="form-group" >
                        <?php if(empty($sliders[$i]['img'])): ?>
                            <img src="<?php echo DOMAIN; ?>/images/content/service-01.jpg" "/>
                        <?php else: ?>
                            <img width="300 px" src="<?php echo $sliders[$i]['img']; ?>"/>
                        <?php endif; ?>
                    </div>
                        <input type="hidden" name="id[]" value="<?php echo $sliders[$i]['id'] ?>"/>

                        <div class="form-group" >
                            <input class="form-control" name="img[]" type="text" readonly="readonly" placeholder="Click here to browse the server" value="<?php echo $sliders[$i]['img'] ?>" onclick="openKCFinder(this)" style="cursor:pointer" />
                        </div>
                        <div id="kcfinder_div"></div>
                </div>    
                <div  class="col-sm-5">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Заголовок</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="title[]" value="<?php echo $sliders[$i]['title']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="description[]" value="<?php echo $sliders[$i]['description']?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Автор(ы) отзыва</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="link[]" value="<?php echo $sliders[$i]['link']?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Опубликован</label>
                        <div class="col-sm-10">
                            <select class="form-control m-bot15" name="is_publication[]">
                                <option value="1" <?php if($sliders[$i]['is_publication'] == 1):?> selected <?php endif; ?>>Опубликован</option>
                                <option value="0" <?php if($sliders[$i]['is_publication'] == 0):?> selected <?php endif; ?>>Снят с публикации</option>
                            </select>
                        </div>
                    </div>
                 </div>  
                </div>
                 <hr>
                <?php endfor;?>
            <div class="form-group col-sm-12">
                        <button class="btn btn-primary" type="submit" name="save">Сохранить</button>
                        </div>
           
            
</form>
        </div>
        </div>

    </section>

<?php require_once 'footer.php'; //подключаем header?> 
        