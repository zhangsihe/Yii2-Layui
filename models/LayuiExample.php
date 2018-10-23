<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LayuiExample extends Model
{

    public $input;
    public $dropDownList;
    public $date;
    public $checkbox;
    public $checkboxList;

    public function rules()
    {
        return [
            [['input','dropDownList','date','checkbox','checkboxList'],'safe'],
            [['input'],'number','min' => 1,'max' => 100]
        ];
    }
}
