
$(document).ready(function() {

    // For all movies page
	var scoreClasses = $('div[class*="score_"]');
	var rateClasses = $('span[class*="rate_"]');
	var rate = [];
	for(var i = 0; i<rateClasses.length; i++)
	{
		$(scoreClasses[i]).raty({
	        width:130, 
	        score: $(rateClasses[i]).data('rate'),
	        click : function(number, evt){
	        	saveVote(number, $(this).data('id'));
	  	  	},
	        path: './../images/rate/',
	        starOff : 'star-off.svg',
	        starOn  : 'star-on.svg' 
	    });
	}
	
});

function getIdToGenerateStars(iRate, iIdDiv, oThisObject){

    $(oThisObject).raty({
        width:130,
        score: iRate,
        click : function(number, evt){
            $.ajax({
                url: "vote",
                type: 'POST',
                data: {"rate":number, "id":$('#' + iIdDiv).data('id')},
                success: function (data, textStatus, jqXHR)
                {
                    if(data.message == "LOGIN")
                    {

                        location.href = "login";
                    }
                }
            });
        },
        path: '../../images/rate/',
        starOff : 'star-off.svg',
        starOn  : 'star-on.svg'
    });
}

//Enregistrement de vote
function saveVote(p_rate, p_id) {

	$.ajax({
		url: "movie/vote",
        type: 'POST',
        data: {"rate":p_rate, "id":p_id},
        success: function (data, textStatus, jqXHR) 
        {
        	if(data.message == "LOGIN")
        	{
        		location.href = "login";
        	}
        }
    });
}
