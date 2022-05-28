<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php
$session = Yii::$app->session;
if ($session->isActive and isset(Yii::$app->user->identity->nombre)) {
?>
<?php $this->beginPage() ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academy</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->createUrl('css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->createUrl('css/adminlte.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php echo $this->render("_header") ?>

    <?php echo $this->render("_sidebar-left"); ?>
    <?php $this->beginBody() ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Matriculas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active">Matriculas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <?php echo $content ?>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->endBody() ?>
    <?php echo $this->render("_footer"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= Yii::$app->getUrlManager()->createUrl('js/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= Yii::$app->getUrlManager()->createUrl('js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= Yii::$app->getUrlManager()->createUrl('js/adminlte.min.js') ?>"></script>
<script src="<?= Yii::$app->getUrlManager()->createUrl('https://cdn.jsdelivr.net/npm/sweetalert2@11') ?>"></script>
<script src="<?= Yii::$app->getUrlManager()->createUrl('https://cdn.jsdelivr.net/npm/sweetalert2@11') ?>"></script>
<script  src="<?= Yii::$app->getUrlManager()->createUrl('https://code.jquery.com/jquery-3.1.1.min.js') ?>"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
</body>
<?php $this->endPage() ?>
<?php } else { ?>
    <?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
    <?php echo $this->render("index"); ?>
    <?php $this->endBody() ?>
    <script  src="<?= Yii::$app->getUrlManager()->createUrl('https://code.jquery.com/jquery-3.1.1.min.js') ?>"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script>
        function sedes(item, index) {
            $("#sede").append("<option value='"+item["idSede"]+"'> "+item["nombre"]+"</option>");
        }
        function cursos(item, index) {
            $("#curso").append("<option value='"+item["idCurso"]+"'> "+item["curso"]+"</option>");
        }
        function jornadas(item, index) {
            $("#jornada").append("<option value='"+item["idJornada"]+"'> "+item["nombre"]+"</option>");
        }

        $(document).ready(function(){
            $.ajax({
                method: "get",
                url: "<?= Yii::$app->getUrlManager()->createUrl('recurso/sedes') ?>",
                success : function(json) {
                    JSON.parse(json).forEach(sedes);
                },
            });

            $.ajax({
                method: "get",
                url: "<?= Yii::$app->getUrlManager()->createUrl('recurso/jornadas') ?>",
                success : function(json) {
                    var a = JSON.parse(json)
                    console.log(a)
                    a.forEach(jornadas);
                },
            });

            $.ajax({
                method: "get",
                url: "<?= Yii::$app->getUrlManager()->createUrl('recurso/cursos') ?>",
                success : function(json) {
                    var a = JSON.parse(json)
                    console.log(a)
                    a.forEach(cursos);
                },
            });
        });


        function enviar(){
            $.ajax({
                method: "get",
                url: "<?= Yii::$app->getUrlManager()->createUrl('recurso/persona') ?>",
                data: { n1: $("#n1").val() ,
                    a1: $("#a1").val()  ,
                    fn: $("#fn").val()  ,
                    se: $("#sede").val()  ,
                    cur: $("#curso").val()  ,
                    jor: $("#jornada").val()  ,
                    n2: $("#n2").val()  ,
                    ce: $("#ce").val() ,
                    co: $("#co").val() ,
                }
            });
        }
    </script>
    <?php $this->endPage() ?>
<?php } ?>