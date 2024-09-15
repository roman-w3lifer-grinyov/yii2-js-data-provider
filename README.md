# [yii2-js-data-provider](https://packagist.org/packages/w3lifer/yii2-js-data-provider)

- [Installation](#installation)
- [Usage](#usage)

## Installation

``` sh
composer require w3lifer/yii2-js-data-provider
```

## Usage

**1. Create `@app/controllers/JsDataProviderController`:**

``` php
<?php

namespace app\controllers;

class JsDataProviderController extends \yii\web\Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
```

---

**2. Create `@app/views/js-data-provider/index.php`:**

``` php
<?php

/**
 * @see \app\controllers\JsDataProviderController::actionIndex()
 *
 * @var \yii\web\View $this
 *
 * @see http://localhost:809/js-data-provider
 */

$this->title = 'JsDataProvider';

\w3lifer\Yii2\JsDataProvider::widget([
    'const' => 'MY_CONST',
    'data' => [
        'foo' => 'bar',
        'baz' => 'qux',
    ],
]);
```

---

**3. The code above registers the following JavaScript in the `<head>` section:**

``` html
<script>const MY_CONST={"foo":"bar","baz":"qux"}</script>
```
