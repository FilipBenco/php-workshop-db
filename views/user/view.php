<?php
/**
 * @var $user \app\models\User
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

echo '<h3>Services</h3>';

echo \yii\grid\GridView::widget([
    'dataProvider' => $services,
    'columns' => [
        'id',
        'name',
        'type',
        [
            'class' => \yii\grid\ActionColumn::class
        ]
    ]
]);