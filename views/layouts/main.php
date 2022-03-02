<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php
$session = Yii::$app->session;
if ($session->isActive) {
//if (1 == 0) { ?>
<?php $this->beginPage() ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <title>AdminLTE 3 | Starter</title>

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
    <?php echo $content ?>
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
</body>
<?php $this->endPage() ?>
<?php } else { ?>
    <?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
    <?php echo $this->render("index"); ?>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
<?php } ?>