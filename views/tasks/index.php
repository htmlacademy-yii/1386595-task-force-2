<?php

/** @var yii\web\View $this */

use app\models\Categories;
use app\models\FilterForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Tasks - TaskForce';
?>
<main class="main-content container">
    <div class="left-column">
        <h3 class="head-main head-task">Новые задания</h3>

        <?php foreach ($tasks as $task): ?>
        <div class="task-card">
            <div class="header-task">
                <a  href="#" class="link link--block link--big"><?=$task->name;?></a>
                <p class="price price--task"><?=$task->price;?> ₽</p>
            </div>
            <p class="info-text">
                <span class="current-time">
                    <?=Yii::$app->formatter->asRelativeTime($task->updated_at, 'now');?>
                </span>
            </p>
            <p class="task-text"><?=$task->description;?></p>
            <div class="footer-task">
                <p class="info-text town-text"><?=$task->city->name;?></p>
                <p class="info-text category-text"><?=$task->category->name;?></p>
                <a href="#" class="button button--black">Смотреть Задание</a>
            </div>
        </div>
        <?php endforeach;?>

        <div class="pagination-wrapper">
                    <ul class="pagination-list">
                        <li class="pagination-item mark">
                            <a href="#" class="link link--page"></a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="link link--page">1</a>
                        </li>
                        <li class="pagination-item pagination-item--active">
                            <a href="#" class="link link--page">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="link link--page">3</a>
                        </li>
                        <li class="pagination-item mark">
                            <a href="#" class="link link--page"></a>
                        </li>
                    </ul>
        </div>
    </div>

    <div class="right-column">
        <div class="right-card black">
            <div class="search-form">
                <?php $form = ActiveForm::begin(['method' => 'get']);?>
                <h4 class="head-card">Категории</h4>
                <div class="form-group">
                    <?=$form->field($filter, 'categories')->checkboxList(Categories::getCategoriesMap());?>
                </div>

                <h4 class="head-card">Дополнительно</h4>
                <div class="form-group">
                    <?=$form->field($filter, 'hasExecutor')->checkbox(['uncheck' => '1', 'value' => 0, 'checked' => 'checked']);?>
                </div>

                <h4 class="head-card">Период</h4>
                <div class="form-group">
                    <?=$form->field($filter, 'period')->dropDownList(FilterForm::getPeriodList());?>
                </div>

                <?=Html::submitButton('Искать', ['class' => 'button button--blue'])?>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </div>
</main>