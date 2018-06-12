<?php
/**
 * @var $service Service
 * @var $shareForm \app\models\ShareServiceForm
 * @var $availableUsers \app\models\User[]
 */

use app\models\Service;

echo "<h1>Share Service {$service->name}</h1>";

$form = \yii\widgets\ActiveForm::begin();

echo $form->field($shareForm, 'user_id')->dropDownList(
    \yii\helpers\ArrayHelper::map($availableUsers, 'id', 'name')
);

echo \yii\helpers\Html::submitButton('Share');

\yii\widgets\ActiveForm::end();