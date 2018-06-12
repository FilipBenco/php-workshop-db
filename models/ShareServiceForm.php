<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 12.6.2018
 * Time: 10:05
 */

namespace app\models;


use yii\base\Model;

class ShareServiceForm extends Model
{
    public $user_id;

    public $service_id;

    public function rules()
    {
        return [
            [ ['user_id', 'service_id'], 'required' ],
            ['user_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['service_id', 'exist', 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return User::findOne($this->user_id);
    }

    /**
     * @return Service
     */
    public function getService()
    {
        return Service::findOne($this->service_id);
    }
}