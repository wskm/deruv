<?php

/* @var $this yii\web\View */

$this->title = \service\Setting::getParamConf('webName');

$this->registerJsFile('js/echarts/echarts.common.min.js');
$this->registerJsFile('js/echarts/char.js');

$pvs = \service\Stat::pvDay();
$infos = \wskm\Info::getList();

$lastLogin = \wskm\Info::getLastLogin();
$onlineCount = \wskm\Info::getOnlineCount();
?>
            
<div class="well well-sm" style="margin:0 0 10px 0;"  >
    <?= Wskm::t('Online quantity {count}, Last logged in {datetime}, {ip}.', 'admin', [
        'count' => $onlineCount,
        'datetime' => Yii::$app->formatter->asDatetime($lastLogin['login_time']),
        'ip' => $lastLogin['ip'],
    ]) ?>
</div>

<div class=" clearfix " >

    <h3><?= Wskm::t('Pv Trend', 'admin') ?></h3>
    <div id="charOne" class="charBox" style="height:380px;" >
    Load...
    </div>

</div>              

<div class="clearfix row" >

    <div class="col-md-12" >
        <div class="panel panel-info">
          <div class="panel-heading"><?= Wskm::t('System Data', 'admin') ?></div>
          <ul class="list-group">
            <li class="list-group-item">
                Deruv<span class="pull-right" ><?= Wskm::$version ?></span>
            </li>
            <?php foreach($infos as $row) { ?>
            <li class="list-group-item"><?= Wskm::t($row['name'], 'admin') ?><span class="pull-right"  ><?= $row['value'] ?></span></li>
            <?php } ?>
          </ul>
        </div>
    </div>

</div>

<script type="text/javascript">
var option = {
    title : {
        subtext: 'PV / <?= \Wskm::t('Date', 'admin') ?>'
    },
    tooltip: {
        trigger: 'item'                
    },
    legend: {
        data:['PV']
    },
    xAxis : [
        {
            type : 'category',
            data : <?= json_encode($pvs['day']) ?>
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                formatter: '{value}'
            }
        }
    ],
    <?php if(Yii::$app->language == 'en-US'){ ?>
    toolbox: {
        show : true,
        feature : {                                                            
            magicType : {show: true, type: ['line', 'bar'], title:{line:"Switch to line",bar:"Switch to bar",stack:"Switch to stack",tiled:"Switch to tiled"} },
            dataView : {show: true, readOnly: false , title: 'Data view', lang: ['data view', 'turn off', 'refresh']},
            restore : {show: true, title: 'Restore'},
            saveAsImage : {show: true, title: 'Save As Image'}
        }                           
    },
    <?php } ?>
    series : [
        {
            "name":"PV",
            "data" : <?= json_encode($pvs['pv']) ?>
        }
    ]
};

$(function(){
    char.line('charOne', option);
});

</script>