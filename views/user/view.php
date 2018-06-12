<?php
/**
 * @var $user \app\models\User
 * @var $services \yii\data\ActiveDataProvider
 * @var $sharedServices \yii\data\ActiveDataProvider
 */

echo \yii\widgets\DetailView::widget([
    'model' => $user,
    'attributes' => [
        'id',               // title attribute (in plain text)
        'name',    // description attribute in HTML
        [                      // the owner name of the model
            'label' => 'Emailova adresa',
            'attribute' => 'email'
        ],
    ],
]);
?>

<h3>Services</h3>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $services,
    'columns' => [
        'id',
        'name',
        'type',
        [
            'class' => \yii\grid\ActionColumn::class,
            'controller' => 'service'
        ]
    ]
]); ?>

<h3>Services shared with user</h3>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $sharedServices,
    'columns' => [
        'id',
        'name',
        'type',
    ]
]); ?>
