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
 * @property $type
 * @property $user_id
 */
class Service extends ActiveRecord
{
    public const TYPE_DOMAIN = 'domain';
    public const TYPE_HOSTING = 'hosting';
    public const TYPE_VPS = 'vps';

    public static function tableName()
    {
        return '{{services}}';
    }

    public function rules()
    {
        return [
            [ ['name', 'type', 'user_id'], 'required' ],
            ['type', 'in', 'range' => [self::TYPE_DOMAIN, self::TYPE_HOSTING, self::TYPE_VPS]],
            ['user_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['id', 'safe']
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}