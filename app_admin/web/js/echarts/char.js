var char = {
    isInit : false,
    objChar : null,
    init : function(){
        if(this.isInit){
            return;
        }

        this.isInit = true;

    },    
    bar : function(id, args, type){
        this.init();

        this.objChar = echarts.init(document.getElementById(id)); 
        var toType = (typeof type == 'boolean' && type ? 'line' : 'bar');

        var option = {
           
            tooltip: {
                trigger: 'axis',
                show: true
            },
        
            toolbox: {
                show : true,
                feature : {                                                            
                    magicType : {show: true, type: ['line', 'bar']},
                    dataView : {show: true, readOnly: false},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }                           
            },
            series : [
                {
                    "type": toType,
                    markPoint : {
                        data : [
                            {type : 'max', name: '最大值'},
                            {type : 'min', name: '最小值'}
                        ]
                    },
                    markLine : {
                        data : [
                            {type : 'average', name: '平均值'}
                        ]
                    }
                }
            ]
        };

        if(toType == 'line'){
            option.xAxis = [
                {
                    boundaryGap : false,
                }
            ];
        }
        
        var toOption = option;
        if(typeof args == 'object'){
            toOption = jQuery.extend(true, option, args);
        }
        
        //console.log(toOption);
        // 为echarts对象加载数据 
        this.objChar.setOption(toOption); 
    },
    line : function(id, args){
        this.init();
        this.bar(id, args, true);        
    }
};
