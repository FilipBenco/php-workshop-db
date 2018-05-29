<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Query;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    /**
     * @throws \yii\db\Exception
     */
    public function actionCreateUser()
    {
        \Yii::$app->db->createCommand()
            ->insert('{{users}}', ['name' => 'Filip Benco', 'email' => 'filip@mail.sk'])
            ->execute();
    }

    public function actionDeleteUser()
    {
        \Yii::$app->db->createCommand()->delete('{{users}}', ['id' => 1])->execute();
    }

    public function actionSelectUsers()
    {
//        $query = new Query();
//        $query->select()->from('{{users}}')->all();

//        $data = (new \yii\db\Query())->select('*')->from('{{users}}')->all();
//        var_dump($data);

        $user = User::findOne(2);
        var_dump($user->id, $user->name, $user->email);
    }
}















