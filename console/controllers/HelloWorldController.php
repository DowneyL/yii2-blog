<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\Post;

class HelloWorldController extends Controller {
    public $rev;

    public function options()
    {
        // ./yii hello-world --rev=1
        return ['rev'];  // 设置命令行参数
    }

    public function optionAliases()
    {
        // ./yii hello-world -r=1
        return ['r' => 'rev']; // 设置命令行参数的别名
    }

    public function actionIndex()
    {
        if($this->rev == 1) {
            echo strrev('Hello, World!') . "\n";
        } else {
            echo "Hello, World!\n";
        }
    }

    public function actionList()
    {
        $posts = Post::find()->all();
        foreach ($posts as $post) {
            echo $post['id'] . ' - ' . $post['title'] . "\n";
        }
    }

    // 带参数的控制台命令

    /**
     * ./yii hello-world/who liheng
     * 带一个参数
     */
    public function actionWho($name)
    {
        echo "Hello, $name!\n";
    }

    public function actionTwo2($name, $other='aragaki')
    {
        echo "Hello, $name and $other!\n";
    }

    /**
     * ./yii hello-world/two liheng ara
     * 带多个参数
     */
    public function actionTwo($name, $other)
    {
        echo "Hello, $name and $other!\n";
    }

    /**
     * ./yii hello-world/all apple, banana, orange
     * 带数组参数
     */
    public function actionAll(array $arr)
    {
        var_dump($arr);
    }

}