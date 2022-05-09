<?php

use yii\helpers\Html;
use yii\bootstrap4\Alert;
use yii\grid\GridView;
use app\models\Supplier;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier List';

?>

<div>
    <p><?= Html::a('Export', 'javascript:download();', ['class' => 'export']) ?></p>
    <div class="alert-info alert alert-dismissible" style="display:none;">
        All conersations on this page have been selected.
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'pager'        => ['class' => 'yii\bootstrap4\LinkPager'],
        'id' => 'grid',
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name'=>'id',
            ],
            'id',
            'code',
            'name',
            [
                'attribute' => 't_status',
                'filter' => Supplier::$tStatusList,
                'filterInputOptions' => ['prompt' => 'all', 'class' => 'form-control'],
            ]
        ]
    ]); ?>
</div>

<script type="application/javascript">

    $(function(){
        $("input[name='SupplierSearch[id]']") .attr('title', 'You can use ">" "<" ">=" "<=" for search. eg: >=5');

    });

    $(".select-on-check-all").click(function(){
        if($(this).is(":checked")==true){
            $('.alert-info') .show();
        }else{
            $('.alert-info') .hide();
        }
    });

    $(".select-on-check-all").change(function(){
        if($(this).is(":checked")==true){
            $('.alert-info') .show();
        }else{
            $('.alert-info') .hide();
        }
    });

    function download() {

        var url = window.location.href;

        if (url.indexOf("?")!=-1) {
            url += '&is_export=1';
        } else {
            url += '?is_export=1';
        }

        var ids = $("#grid").yiiGridView("getSelectedRows");

        if (ids.length != 0) {
            url += '&ids=' + ids.join(",");
        }

        location.href = url;
    }

</script>
