$(document).ready(function(){
	
	$('#sub').click(function(){
		event.preventDefault();
		var source = $('#source').val();
		var keystring = $('#keystring').val();		
		var data = {
			source:source,
			keystring:keystring
		}
		$.ajax({
			type:'post',
			url:"",
			data:data,
			complete:function(msg){
				console.log(msg.responseText);
				var score = msg.responseText;
				score = (Math.round(parseFloat(score)*10))/10;
				$("div.result").append('<span><h1>'+score+'</h1></span>');
				$("#ajax-loader").remove();
			}
		})
		$('form').append('<div id="ajax-loader"><br/><br/><img src="public/images/ajax-loader.gif"/></div>');
		$('#results').empty()
		$('#results').append('<div class="result row"><div class="span4"></div></div>');
		// var imgSrc = $("#source").val();
		// $('#results').append('<div class="result row"><img style="height:120px" src="public/images/'+imgSrc+'.jpg"></div>');
	});

});