<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4" >

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
        <div class="widget">
            <h4>Кратко о блоге</h4>
            <p>В этом блоге я рассказываю о себе, своих родных, друзей. Ну и про врагов забывать не будем</p>
            <img src="images/myfamily.jpg" alt="myfamilly" class="img-responsive">
        </div>
    </div>
</div>


<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
</footer>

</div>
<!-- /.container -->

<!--Modal Content-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Добавим пост!</h4>
            </div>
            <form  id="formAddPost" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="well">
                        <div class="form-group">
                            <label for="title">Заголовок поста</label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Введите заголовок...">
                            <div id="errorTitle"></div>
                        </div>
                        <div class="form-group">
                            <label for="content">Текст поста</label>
                            <textarea rows="4" class="form-control" name="content" id="content" placeholder="Раскройте тему сдесь..."></textarea>
                            <div id="errorContent"></div>
                        </div>
                        <div class="form-group">
                            <label for="data">Выбор изображения</label>
                            <input type="file" name="data" id="data">
                            <div id="errorFile"></div>
                        </div>
                        <div class="form-group">
                            <label for="category">Категория поста</label>
                            <select class="form-control" name="category" id="category">
                               <option value="1" selected="selected">Семья</option>
                                <option value="2">Работа</option>
                                <option value="3">Фриланс</option>
                                <option value="4">Отдых</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="addPost" id="addPost" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
</body>

</html>