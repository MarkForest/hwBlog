<?php
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
    $sql = "select * from posts,categories where posts.category_id=categories.id order by posts.id desc";
}catch(PDOException $ex){
    $db->rollBack();
    echo "<p style='color:red'>{$ex->getMessage()}</p>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MarkForest's Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Блог Марченко Анатолия</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#">Обо мне</a>
                    </li>
                    <li>
                        <a href="#">Сервисы</a>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>
                    <li>
                        <a href="#">Регистрация</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Новости
                    <small>Обо всем</small>
                </h1>

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
                <p><?=$row['content']?></p>
                <a class="btn btn-primary" href="post.php">Читать больше<span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php endforeach;?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Старые</a>
                    </li>
                    <li class="next">
                        <a href="#">Новые &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Поиск в блоге</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Категории новостей</h4>
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list-unstyled">
                                <li><a href="#">Семья</a>
                                </li>
                                <li><a href="#">Работа</a>
                                </li>
                                <li><a href="#">Фриланс</a>
                                </li>
                                <li><a href="#">Отдых</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-xs-12 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
