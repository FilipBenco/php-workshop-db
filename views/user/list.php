<?php
/**
 * @var $usersDP \yii\data\ActiveDataProvider
 */
?>
<div class="text-right">
    <?= \yii\helpers\Html::a('Create User', ['/user/create'], ['class' => 'btn btn-info']); ?>
</div>

<?php
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