<?php

namespace w3lifer\Yii2;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View;

class JsDataProvider extends Widget
{
    public string $const;

    public array|int|string $data;

    private static array $registeredVars = [];

    public function init()
    {
        parent::init();
        if (!$this->const) {
            throw new InvalidConfigException('Missing required value for ' . self::className() . '::$const property.');
        }
        if (in_array($this->const, self::$registeredVars)) {
            throw new InvalidConfigException('The specified constant is already registered.');
        }
        self::$registeredVars[] = $this->const;
    }

    public function run()
    {
        $this->view->registerJs('const ' . $this->const . '=' . Json::htmlEncode($this->data), View::POS_HEAD);
    }
}
