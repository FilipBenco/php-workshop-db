<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 23.5.2018
 * Time: 15:10
 */

namespace app\controllers;


use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionIndex()
    {
        $usersDP = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        return $this->render('list', ['usersDP' => $usersDP]);
    }

    public function actionUpdate($id)
    {
        $user = User::findOne($id);

        if ($user->load($_POST) && $user->validate()) {
            if ($user->save()) {
                \Yii::$app->session->setFlash('success', 'Uzivatel je zmeneny');
                return $this->redirect('/user');
            }
        }

        return $this->render('form', ['user' => $user]);
    }

    public function actionCreate()
    {
        $user = new User();

        if ($user->load($_POST) && $user->validate()) {
            if ($user->save()) {
                \Yii::$app->session->setFlash('success', 'Uzivatel je vytvoreny');
                return $this->redirect('/user');
            }
        }

        return $this->render('form', ['user' => $user]);
    }

    public function actionDelete($id)
    {
        User::findOne($id)->delete();
        \Yii::$app->session->setFlash('success', 'Uzivatel je prec');
        return $this->redirect('/user');
    }
}