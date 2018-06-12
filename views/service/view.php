<?php
/**
 * @var $service \app\models\Service
 * @var $subAdmins \yii\data\ActiveDataProvider
 */
?>
    <div class="text-right" style="margin-bottom: 10px;">
        <?= \yii\helpers\Html::a(
            'Share Service',
            ['/service/share', 'id' => $service->id],
            ['class' => 'btn btn-info']
        ); ?>
    </div>

<?php
echo \yii\widgets\DetailView::widget([
    'model' => $service,
    'attributes' => [
        'id',               // title attribute (in plain text)
        'name',    // description attribute in HTML
        'type',
        [
            'attribute' => 'user',
            'value' => function ($model) {
                return \yii\helpers\Html::a($model->user->name, ['/user/view', 'id' => $model->user->id]);
            },
            'format' => 'html'
        ]
    ],
]);
?>


<h3>Sub Admins</h3>

<?php
echo \yii\grid\GridView::widget([
    'dataProvider' => $subAdmins,
    'columns' => [
        'id',
        'name',
        [
            'class' => \yii\grid\ActionColumn::class,
            'template' => '{unShare}',
            'buttons' => [
                'unShare' => function ($url, $model, $key) use($service) {
                    return \yii\helpers\Html::a(
                        'Remove',
                        ['/service/un-share', 'userId' => $model->id, 'serviceId' => $service->id]
                    );
                },
            ]
        ]
    ]
]);
