<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contacts $model */

$this->title = 'Create Contacts';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
