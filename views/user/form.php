<?php
/**
 * @var $user \app\models\User
 */

$form = \yii\widgets\ActiveForm::begin();

echo $form->field($user, 'name');
echo $form->field($user, 'email');

echo \yii\helpers\Html::submitButton('Save');

\yii\widgets\ActiveForm::end();