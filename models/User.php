<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 23.5.2018
 * Time: 15:03
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class User
 * @package app\models
 *
 * @property $id
 * @property $name
 * @property $email
 */
class User extends ActiveRecord
{
    public static function tableName()
    {
        return '{{users}}';
    }

    public function rules()
    {
        return [
            [ ['name', 'email'], 'required' ],
            ['email', 'email'],
            ['id', 'safe']
        ];
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['user_id' => 'id']);
    }

}