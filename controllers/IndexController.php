<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\models\LayuiExample;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $data = [
            ['id' => 1, 'name' => 'name 1'],
            ['id' => 2, 'name' => 'name 2'],
            ['id' => 100, 'name' => 'name 100'],
        ];

        $model = new LayuiExample();

        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'name'],
            ],
        ]);

        return $this->render('index',compact('provider','model'));
    }
}
