<?php require_once 'header.php'; //подключаем header?> 

     <!--body wrapper start-->
    <div class="wrapper">

        <div class="row">
        <div class="col-sm-offset-2 col-sm-8">



        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Дата</th>
            <th>Опубликовано</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
        <tr class="gradeA">
            <td><?php echo $review['name']; ?></td>
            <td><?php echo date("m-d-Y", $review['date']); ?></td>
            <td>
                <a href="<?php DOMAIN; ?>/adminpanel/publicreview/<?php echo $review['id']; ?>" > <i <?php echo ($review['is_publication'] == 0) ? 'class="fa fa-times"  style="font-size:20px; color:#cc0000 "' : "class='fa fa-check'"; ?>></i></a>
            </td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/reviewedit/<?php echo $review['id']; ?> " ><i class="fa fa-edit"></i></a></td>
            <td><a href="<?php DOMAIN; ?>/adminpanel/delreview/<?php echo $review['id']; ?>"> <i class="fa fa-trash-o"></i></a></td>
        </tr>
            <?php endforeach; ?>
  
        </tbody>
        </table>
        </div>
        </div>
            <div>
                
            </div>
        <div class="col-sm-offset-2 col-sm-8">
            <form action="./createreview" class="form-horizontal adminex-form" method="post">
                    <label class="col-sm-2 col-sm-2 control-label">Название записи</label>
                    <div class="col-sm-6"><input type="text" class="form-control" name="name"></div>
                <button class="btn btn-primary" type="submit" name="create">Создать</button>
            </form>

        </div>
        </div>
        </div>


        <?php require_once 'footer.php'; //подключаем header?> 
        