<?php
/**
 * Created by PhpStorm.
 * service: filip
 * Date: 23.5.2018
 * Time: 15:10
 */

namespace app\controllers;


use app\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ServiceController extends Controller
{

    public function actionIndex()
    {
        $servicesDP = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        return $this->render('list', ['servicesDP' => $servicesDP]);
    }

    public function actionUpdate($id)
    {
        $service = Service::findOne($id);

        if ($service->load($_POST) && $service->validate()) {
            if ($service->save()) {
                \Yii::$app->session->setFlash('success', 'Uzivatel je zmeneny');
                return $this->redirect('/service');
            }
        }

        return $this->render('form', ['service' => $service]);
    }

    public function actionCreate()
    {
        $service = new Service();

        if ($service->load($_POST) && $service->validate()) {
            if ($service->save()) {
                \Yii::$app->session->setFlash('success', 'Uzivatel je vytvoreny');
                return $this->redirect('/service');
            }
        }

        return $this->render('form', ['service' => $service]);
    }

    public function actionDelete($id)
    {
        Service::findOne($id)->delete();
        \Yii::$app->session->setFlash('success', 'Uzivatel je prec');
        return $this->redirect('/service');
    }
}