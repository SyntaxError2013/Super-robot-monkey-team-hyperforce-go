$(document).ready(function(){
	
	$('#sub2').click(function(){
		event.preventDefault();
		var keystring = $('#keystring2').val();		
		var data = {
			keystring:keystring
		}
		$.ajax({
			type:'get',
			url:"csearch/"+keystring,
			data:data,
			complete:function(msg){
				console.log(msg.responseText);
				var score = msg.responseText;
				score = score*50 +5;
				score = (Math.round(parseFloat(score)*10))/10;

				rating = '';
				if(score > 8) 
					rating = "Extremely positive";
				else if(score > 6)
					rating = "Fairly positive";
				else if(score > 4)
					rating = "Mixed";
				else 
					rating = "Relatively Poor";
				$("div.result").append('<span><h1>'+rating+':'+score+'</h1></span>');
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