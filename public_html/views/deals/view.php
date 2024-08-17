<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'amount',
            [
                'label' => 'Контакты',
                'value' => function ($model) {
                    $contactDetails = [];
                    foreach ($model->contacts as $contact) {
                        $contactDetails[] = "Контак ID {$contact->id} | {$contact->first_name} {$contact->last_name}";
                    }
                    return implode('<br>', $contactDetails);
                },
                'format' => 'html', 
            ],
        ],
    ]) ?>

    <h2>Контакты</h2>
    <ul>
        <?php foreach ($model->contacts as $contact): ?>
            <li> <?= Html::a(Html::encode("{$contact->first_name} {$contact->last_name}"), ['contacts/view', 'id' => $contact->id]) ?></li>

        <?php endforeach; ?>
    </ul>

</div>