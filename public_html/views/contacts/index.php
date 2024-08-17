<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="list" style="width: 30%; float: left;">
        <ul>
            <?php foreach ($dataProvider->models as $contact): ?>
                <li><?= Html::a($contact->first_name . ' ' . $contact->last_name, ['view', 'id' => $contact->id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="details" style="width: 65%; float: right;">
        <p>Select a contact to view details.</p>
    </div>

    <div style="clear: both;"></div>
</div>
