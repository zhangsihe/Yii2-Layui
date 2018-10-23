<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$editIcon = '<i class="layui-icon">&#xe642;</i>';
$editOpt = ['class' => 'layui-btn layui-btn-small layui-btn-normal', 'title' => '编辑'];
?>

<div style="margin-top:100px">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'layui-form',],
        'fieldConfig' => [
            'template' =>'<div class="layui-form-item">{label}<div class="layui-input-block" >{input}{error}</div>{hint}</div>',
            'labelOptions' => ['class' => 'layui-form-label'],
            'options'      => ['class' => 'layui-form-item layui-col-md5','style' => 'min-width:600px']
        ]]); ?>
    <?= $form->field($model, 'input')->textInput(['class' => 'layui-input']) ?>
    <?= $form->field($model, 'dropDownList')->dropDownList(['portrait' => '是吗','landscape'=>'不是'],['prompt' => '请选择', 'lay-search'=>'']); ?>
    <?= $form->field($model, 'date')->textInput(['class' => 'layui-input', 'id' => 'layui_date'])->label(); ?>
    <?= $form->field($model, 'checkbox')->checkbox(['lay-skin' => 'switch', 'lay-text' => '是|否'], false)?>
    <?= $form->field($model, 'checkboxList', ['template'=>'{label}<div class="layui-input-block">{input}{error}</div>'])->checkboxList([0 => 't1',1 => 't2', 2 => 't3', 3 => 't4'], ['item' => function($index, $label, $name, $checked, $value){
        $checkStr = $checked?"checked":"";
        return '<input type="checkbox" name="'.$name.'" value="'.$value.'" title="'.$label.'" '.$checkStr.'>';
    }])?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <div class="controls">
                <?= Html::submitButton('提  交', ['class' => 'layui-btn'])?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end();?>


    <div class="layui-row">
        <div class="layui-form-item">
            <blockquote class="layui-elem-quote">与Yii2结合的Layui表格</blockquote>
            <?=  GridView::widget([
                'tableOptions' => ['class' => 'layui-table', 'align' => 'center'],
                'pager'        => [
                    'class' => 'app\widgets\LayuiLinkPager',
                    'options' => [
                        'class' => 'layui-box layui-laypage layui-laypage-molv',
                    ],
                    'firstPageLabel' => '首页',
                    'prevPageLabel'  => '上一页',
                    'nextPageLabel'  => '下一页',
                    'lastPageLabel'  => '尾页'
                ],
                'dataProvider' => $provider,
                'layout' => "{items} {pager}",
                'columns' => [
                    'id',
                    'name',
                    [
                        'header'=>'<a href="javascript:void(0);">操作</a>',
                        'contentOptions' => [
                            'style' => 'white-space:nowrap; '
                        ],
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '<div class="layui-btn-group"> {edit}{delete}</div>',
                        'buttons' => [
                            'edit' => function($url, $model, $key) use ($editIcon,$editOpt){
                                return Html::a($editIcon,Url::to(['index/index','id' => $model['id']]), $editOpt);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="layui-icon">&#xe640;</i>',Url::to(['index/index','id' => $model['id']]),['class' => 'layui-btn layui-btn-normal layui-btn-small', 'title' => '删除','data'  => ['confirm'=>'确认删除?']],
                                    ['title' => '删除']);
                            }
                        ],
                    ],
                ]
            ]);?>
        </div>
    </div>
</div>
