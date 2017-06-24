<?php

/* @var $this yii\web\View */

$this->title = \service\Setting::getParamConf('webName');

$this->registerJsFile('js/echarts/echarts.simple.min.js');
$this->registerJsFile('js/echarts/char.js');

?>
            
            <div class="well well-sm" style="margin:0 0 10px 0;"  >
                在线3人，最后访问 2017年4月10日13:24:21，IP 127.0.0.1
            </div>

			<div class=" clearfix " >

                <h3>PV走势</h3>
                <div id="charOne" style="height:380px" >
                load...
                </div>

            </div>
    
            <script type="text/javascript">
            var option = {
                title : {
                    subtext: 'PV / 日期'
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
                        data : ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        axisLabel : {
                            formatter: '{value} 次'
                        }
                    }
                ],
                series : [
                    {
                        "name":"PV",
                        "data":[5, 20, 40, 10, 10, 20]
                    }
                ]
            };
            
            $(function(){
                char.line('charOne', option);
            });
            
            </script>

            <div class="clearfix row" >
				<div class="col-md-6 col-sm-12" >
					<div class="panel panel-success">
					  <div class="panel-heading">系统信息</div>
					  <ul class="list-group">
						<li class="list-group-item">
							Deruv<span class=" label label-danger pull-right" style="background-color:transparent;color:#333" >1.0</span>
						</li>
						<li class="list-group-item">PHP<span class=" label label-danger pull-right" style="background-color:transparent;color:#333" >7.0</span></li>
						<li class="list-group-item">Mysql</li>
						<li class="list-group-item">附件大小</li>
						<li class="list-group-item">Vestibulum at eros</li>
					  </ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-12" >
					<div class="panel panel-info">
					  <div class="panel-heading">统计信息</div>
					  <ul class="list-group">
						<li class="list-group-item"><span class=" label label-danger pull-right">142</span>Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					  </ul>
					</div>
				</div>
       
            </div>