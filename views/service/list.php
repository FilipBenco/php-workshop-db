<?php
/**
 * @var $servicesDP \yii\data\ActiveDataProvider
 */
?>
    <div class="text-right">
        <?= \yii\helpers\Html::a('Create Service', ['/service/create'], ['class' => 'btn btn-info']); ?>
    </div>

<?php
echo \yii\grid\GridView::widget([
    'dataProvider' => $servicesDP,
    'columns' => [
        'id',
        'name',
        'type',
        'user.name',
        [
            'class' => \yii\grid\ActionColumn::class
        ]
    ]
]);