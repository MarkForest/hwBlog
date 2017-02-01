<?php
$titlePage = "Home";
try {
    $dsn = "sqlite:blog.sqlite";
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->beginTransaction();
    $path_img = "images/9.jpg";
    $dbdate = date("F d, Y")." at ".date("H:i A");
    $content = "Давно выяснено, что при оценке дизайна и композиции читаемый
                текст мешает сосредоточиться. Lorem Ipsum используют потому,
                 что тот обеспечивает более или менее стандартное заполнение
                  шаблона, а также реальное распределение букв и пробелов в
                  абзацах, которое не получается при простой дубликации
                  \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\"
                   Многие программы электронной вёрстки и редакторы HTML
                    используют Lorem Ipsum в качестве текста по умолчанию,
                     так что поиск по ключевым словам \"lorem ipsum\"
                      сразу показывает, как много веб-страниц всё ещё
                      дожидаются своего настоящего рождения. За прошедшие
                       годы текст Lorem Ipsum получил много версий.
                       Некоторые версии появились по ошибке, некоторые - намеренно
                       (например, юмористические варианты).";
//    $sql = "insert into posts(category_id,published_date,path_img,title,content)
//                        VALUES(1,'$dbdate','$path_img','Племянице купили планшет','$content')";
//    $db->commit();
//$db->exec($sql);
    if(!isset($_GET['offset'])){
        $offset = 0;
    }else{
        $offset = $_GET['offset'];
    }
    $sql = "select * from posts,categories where posts.category_id=categories.id order by posts.id desc limit $offset,4";
    $sqlCount = "select count(id) from posts";
    $countPosts="";
    foreach($db->query($sqlCount) as $row){$countPosts=$row['count(id)'];}

}catch(PDOException $ex){
    $db->rollBack();
    echo "<p style='color:red'>{$ex->getMessage()}</p>";
}
include_once "header.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <h1 class="page-header">
                    Новости
                    <small>Обо всем</small>
                </h1>
                <ul class="pager">
                    <li class="previous <?php echo $offset==0?'hide':'show'?>">
                        <a href="index.php?offset=<?php echo $offset-4?>">&larr; Новые</a>
                    </li>
                    <li class="next <?php echo $offset+4>$countPosts?'hide':'show'?>">
                        <a href="index.php?offset=<?php echo $offset+4?>">Старые &rarr;</a>
                    </li>
                </ul>
                <!--Blog Posts -->
                <?php foreach($db->query($sql) as $row):?>
                <h2>
                    <a href="#"><?=$row['title']?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?=$row['name']?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Опубликовано <?=$row['published_date']?></p>
                <hr>
                <img class="img-responsive" src="<?=$row['path_img']?>" alt="">
                <hr>
                <p><?php
                        $str=substr($row['content'],0,500)."...";
                        echo $str;
                    ?>
                </p>
                <a class="btn btn-primary" href="post.php?id=<?=$row[0]?>">Читать больше<span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php endforeach;?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous <?php echo $offset==0?'hide':'show'?>">
                        <a href="index.php?offset=<?php echo $offset-4?>">&larr; Новые</a>
                    </li>
                    <li class="next <?php echo $offset+4>$countPosts?'hide':'show'?>">
                        <a href="index.php?offset=<?php echo $offset+4?>">Старые &rarr;</a>
                    </li>
                </ul>
            </div>

<?php include_once "footer.php";?>
