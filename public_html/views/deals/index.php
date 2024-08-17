<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сделки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="list" style="width: 30%; float: left;">
        <ul>
            <?php foreach ($dataProvider->models as $deal): ?>
                <li><?= Html::a($deal->name, ['view', 'id' => $deal->id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="details" style="width: 65%; float: right;">
        <p>Select a deal to view details.</p>
    </div>

    <div style="clear: both;"></div>
</div>
