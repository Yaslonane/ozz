<?php require_once 'header.php'; //подключаем header?> 

     <!--body wrapper start-->
    <div class="wrapper">

        <div class="row">
        <div class="col-sm-12">



        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Заголовок страницы</th>
            <th>Заголовок статьи</th>
            <th>Автор</th>
            <th>Дата</th>
            <th>Опубликовано</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
        <tr class="gradeA">
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['name']; ?></td>
            <td><?php echo $post['autor']; ?></td>
            <td><?php echo date("m-d-Y", $post['date']); ?></td>
            <td>
                <a href="<?php DOMAIN; ?>/adminpanel/publicpost/<?php echo $post['id']; ?>" > <i <?php echo ($post['is_publication'] == 0) ? 'class="fa fa-times"  style="font-size:20px; color:#cc0000 "' : "class='fa fa-check'"; ?>></i></a>
            </td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/posts/<?php echo $post['id']; ?> " ><i class="fa fa-edit"></i></a></td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/delpost/<?php echo $post['id']; ?>"> <i class="fa fa-trash-o"></i></a></td>
        </tr>
            <?php endforeach; ?>
  
        </tbody>
        </table>
        </div>
        </div>
            <div>
                
            </div>
            <form action="./createpost" class="form-horizontal adminex-form" method="post">
                    <label class="col-sm-2 col-sm-2 control-label">Название записи</label>
                    <div class="col-sm-6"><input type="text" class="form-control" name="name"></div>
                <button class="btn btn-primary" type="submit" name="create">Создать</button>
            </form>

        </div>
        </div>


        <?php require_once 'footer.php'; //подключаем header?> 
        