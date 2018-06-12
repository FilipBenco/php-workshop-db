<?php
/**
 * Created by PhpStorm.
 * service: filip
 * Date: 23.5.2018
 * Time: 15:10
 */

namespace app\controllers;


use app\models\Service;
use app\models\ShareServiceForm;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ServiceController extends Controller
{

    public function actionIndex()
    {
        $servicesDP = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('list', ['servicesDP' => $servicesDP]);
    }

    public function actionView($id)
    {
        $service = Service::findOne($id);

        $subAdmins = new ActiveDataProvider([
            'query' => $service->getSubAdmins(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('view', ['service' => $service, 'subAdmins' => $subAdmins]);
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

    public function actionShare($id)
    {
        $service = Service::findOne($id);

        $form = new ShareServiceForm();
        $form->service_id = $service->id;
        if ($form->load($_POST) && $form->validate()) {
            $service->link('subAdmins', $form->getUser());
            \Yii::$app->session->setFlash('success', 'Sluzba je nazdielana');
            return $this->redirect(['/service/view', 'id' => $id]);
        }

        $sharedUsers = ArrayHelper::getColumn($service->subAdmins, 'id');
        $sharedUsers[] = $service->user_id;
        $availableUsers = User::find()->where(['not in', 'id', $sharedUsers])->all();
        
        return $this->render(
            'shareForm',
            ['service' => $service, 'shareForm' => $form, 'availableUsers' => $availableUsers]
        );
    }

    public function actionUnShare($serviceId, $userId)
    {
        $service = Service::findOne($serviceId);
        $user = User::findOne($userId);
        $service->unlink('subAdmins', $user, true);
        \Yii::$app->session->setFlash('success', 'Zdielanie zmazane');
        return $this->redirect(['/service/view', 'id' => $serviceId]);
    }
}