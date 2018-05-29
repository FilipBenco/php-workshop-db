<?php
/**
 * @var $usersDP \yii\data\ActiveDataProvider
 */

echo \yii\helpers\Html::a('Create', ['/user/create']);

echo \yii\grid\GridView::widget([
    'dataProvider' => $usersDP,
    'columns' => [
        'id',
        'name',
        'email',
        [
            'class' => \yii\grid\ActionColumn::class
        ]
    ]
]);