<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\assets\TasksAsset;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

AppAsset::register($this);
TasksAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
    <head>
        <meta charset="<?=Yii::$app->charset?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags()?>
        <title><?=Html::encode($this->title)?></title>
        <?php $this->head()?>
    </head>

    <body>
    <?php $this->beginBody()?>
        <header class="page-header">
            <nav class="main-nav">
                <a href='#' class="header-logo">
                    <img class="logo-image" src="img/logotype.png" width=227 height=60 alt="taskforce">
                </a>
                <div class="nav-wrapper">
                    <ul class="nav-list">
                        <li class="list-item list-item--active">
                            <a class="link link--nav" >Новое</a>
                        </li>
                        <li class="list-item">
                            <a href="#" class="link link--nav" >Мои задания</a>
                        </li>
                        <li class="list-item">
                            <a href="#" class="link link--nav" >Создать задание</a>
                        </li>
                        <li class="list-item">
                            <a href="#" class="link link--nav" >Настройки</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="user-block">
                <a href="#">
                    <img class="user-photo" src="img/man-glasses.png" width="55" height="55" alt="Аватар">
                </a>
                <div class="user-menu">
                    <p class="user-name">Василий</p>
                    <div class="popup-head">
                        <ul class="popup-menu">
                            <li class="menu-item">
                                <a href="#" class="link">Настройки</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="link">Связаться с нами</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="link">Выход из системы</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main role="main" class="flex-shrink-0">
            <div class="main-container">
                <?=$content?>
            </div>
        </main>

    <div class="overlay"></div>

    <?php $this->endBody()?>
    </body>
</html>
<?php $this->endPage()?>