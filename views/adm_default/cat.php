<?php require_once 'header.php'; //подключаем header?> 

     <!--body wrapper start-->
    <div class="wrapper">

        <div class="row">
        <div class="col-sm-12">



        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Имя категории</th>
            <th>Описание</th>
            <th>Опубликовано</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($categoryList as $cat): ?>
        <tr class="gradeA">
            <td><?php echo $cat['name']; ?></td>
            <td><?php echo $cat['description']; ?></td>
            <td>
                <a href="<?php DOMAIN; ?>/adminpanel/publiccat/<?php echo $cat['id']; ?>" > <i <?php echo ($cat['is_publication'] == 0) ? 'class="fa fa-times"  style="font-size:20px; color:#cc0000 "' : "class='fa fa-check'"; ?>></i></a>
            </td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/category/<?php echo $cat['id']; ?> " ><i class="fa fa-edit"></i></a></td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/delcat/<?php echo $cat['id']; ?>"> <i class="fa fa-trash-o"></i></a></td>
        </tr>
            <?php endforeach; ?>
  
        </tbody>
        </table>
        </div>
        </div>
            <div>
                
            </div>
            <form action="./createcat" class="form-horizontal adminex-form" method="post">
                    <label class="col-sm-2 col-sm-2 control-label">Название категории</label>
                    <div class="col-sm-6"><input type="text" class="form-control" name="name"></div>
                <button class="btn btn-primary" type="submit" name="create">Создать</button>
            </form>
        </div>
        </div>


        <?php require_once 'footer.php'; //подключаем header?> 
        