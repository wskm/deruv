
function initTop(){
    if ($(window).width() > 1000)
    {
        $('#sidepanel').css('right', ($(window).width()-$('#site-main').outerWidth(false)) / 2 - 35 );
        $(window).on('scroll', function(){
            if ($(document).scrollTop() > 300) {
                $("#sidepanel").show();
            } else {
                $("#sidepanel").hide();
            }
        })

        $("#sidepanel a").click(function(){
            $("html,body").animate({scrollTop:0}, 180);
        })
    }
}

function getUser(url) {
	$.getJSON(url,function(data){
		if (!data) {
			$('#site-login').show();
			$('#site-signup').show();
			return;
		}
		
		$('#site-user').show();
	});
}

function stat(url) {
	$.get(url, function(data){
	});
}

function statContent(url) {
	$.get(url, function(data){
		var pv = parseInt(data);
		pv && $('#site-pv').text(pv);
	});
}

$(function(){
    initTop();	
});