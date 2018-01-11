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
            Редактирование категории
        </header>
        <div class="panel-body">
        <div class="wrapper">
        <div class="row">
            <form action="" class="form-horizontal adminex-form" enctype="multipart/form-data" method="post">
            <div  class="col-sm-4">
                <div class="form-group" >
                    <?php if(empty($category['img'])): ?>
                        <img src="<?php echo DOMAIN; ?>/images/content/service-01.jpg" "/>
                    <?php else: ?>
                        <img width="300 px" src="<?php echo $category['img']; ?>"/>
                    <?php endif; ?>
                </div>
                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>"/>
                    
                    <div class="form-group" >
                        <input class="form-control" name="img" type="text" readonly="readonly" placeholder="Click here to browse the server" value="<?php echo $category['img'] ?>" onclick="openKCFinder(this)" style="cursor:pointer" />
                    </div>
                    <div id="kcfinder_div"></div>
                
            </div>
            
            
<div class="col-sm-8">                

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Опубликован</label>
                            <div class="col-sm-10">
                                <select class="form-control m-bot15" name="is_publication">
                                    <option value="1" <?php if($category['is_publication'] == 1):?> selected <?php endif; ?>>Опубликован</option>
                                    <option value="0" <?php if($category['is_publication'] == 0):?> selected <?php endif; ?>>Снят с публикации</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Название услуги</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="name" value="<?php echo $category['name']?>"></div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="control-label">Описание</label>
                        <div>
                            <textarea name="description" class="form-control " rows="6"><?php echo $category['description']?></textarea>
                            </div>
                    </div>

 </div>
            <div class="col-sm-12">  


                    <div class="form-group col-sm-6">
                        <label class="control-label">Meta-kw</label>
                        <div>
                            <textarea name="meta_kw" class="form-control " rows="6"><?php echo $category['meta_kw']?></textarea>
                            </div>
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label class="control-label">Meta-d</label>
                        <div>
                            <textarea name="meta_d" class="form-control" rows="6"><?php echo $category['meta_d']?></textarea>
                            </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit" name="save">Сохранить</button>
            </div>    
            </form>
        

        </div>
        </div>
        </div>
    </section>

<?php require_once 'footer.php'; //подключаем header?> 
        