<?php
/**
 * @var $servicesDP \yii\data\ActiveDataProvider
 */

echo \yii\helpers\Html::a('Create', ['/service/create']);

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