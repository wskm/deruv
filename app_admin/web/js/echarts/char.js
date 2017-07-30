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
           
            /*tooltip: {
                trigger: 'axis',
                show: true
            },*/
			tooltip: {
				trigger: 'axis',
				axisPointer: {
					type: 'cross'
				}
			},
			
            toolbox: {
                show : true,
                feature : {                                                            
                    magicType : {show: true, type: ['line', 'bar'] },
                    dataView : {show: true, readOnly: false },
                    restore : {show: true},
                    saveAsImage : {show: true}
                }                           
            },
            series : [
                {
                    "type": toType,						
                    markPoint : {
                        data : [
                            {type : 'max', name: 'Max'},
                            {type : 'min', name: 'Min'}
                        ]
                    },
                    markLine : {
                        data : [
                            {type : 'average', name: 'Average'}
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

		this.objChar.showLoading();
        this.objChar.setOption(toOption); 
		this.objChar.hideLoading();
		
		var charer = this.objChar;
		setTimeout(function(){
			charer.resize();
		}, 800);
    },
    line : function(id, args){
        this.init();
        this.bar(id, args, true);        
    }
};
