<?php

/* @var $this yii\web\View */

$this->title = \service\Setting::getParamConf('webName');

$this->registerJsFile('js/echarts/echarts.common.min.js');
$this->registerJsFile('js/echarts/char.js');

?>
            
            <div class="well well-sm" style="margin:0 0 10px 0;"  >
                在线3人，最后访问 2017年4月10日13:24:21，IP 127.0.0.1
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
							Deruv<span class="pull-right" >1.0.0</span>
						</li>
						<?php foreach($info as $row) { ?>
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
                        data : <?= json_encode($pv['day']) ?>
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
                series : [
                    {
                        "name":"PV",
                        "data" : <?= json_encode($pv['pv']) ?>
                    }
                ]
            };
            
            $(function(){
				char.line('charOne', option);
            });
            
            </script>