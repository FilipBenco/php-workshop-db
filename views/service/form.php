<?php
/**
 * @var $service \app\models\Service
 */

use app\models\Service;

if ($service->isNewRecord) {
    echo "<h1>New Service</h1>";
} else {
    echo "<h1>Service {$service->name} for user {$service->user->name}</h1>";
}

$form = \yii\widgets\ActiveForm::begin();

echo $form->field($service, 'name');
echo $form->field($service, 'type')
    ->dropDownList([Service::TYPE_DOMAIN => 'Domena', Service::TYPE_HOSTING => 'Hosting', Service::TYPE_VPS => 'VPS']);
echo $form->field($service, 'user_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'name')
);

echo \yii\helpers\Html::submitButton('Save');

\yii\widgets\ActiveForm::end();