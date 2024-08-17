<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',

            [
                'label' => 'Сделки',
                'value' => function ($model) {
                    $dealDetails = [];
                    foreach ($model->deals as $deal) {
                        $dealDetails[] = "cделки ID {$deal->id} | {$deal->name} ";
                    }
                    return implode('<br>', $dealDetails);
                },
                'format' => 'html', 
            ],


        ],
    ]) ?>

    <h3>Сделки</h3>
    <ul>
 
        <?php foreach ($model->deals as $deal): ?>
            <li><?= Html::a($deal->name, ['deals/view', 'id' => $deal->id]) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
