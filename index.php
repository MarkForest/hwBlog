<?php
$titlePage = "Home";
try {
    $dsn = "sqlite:blog.sqlite";
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->beginTransaction();

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
                    <a href="post.php?id=<?=$row[0]?>"><?=$row['title']?></a>
                </h2>
                <p class="lead">
                    Категория:  <a href="index.php"><?=$row['name']?></a>
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
