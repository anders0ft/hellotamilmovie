
// Enregistrement de vote
function saveVote(p_vote, p_id)
{

	console.log("TSSSS : " + p_id);
	$.ajax({
		url: "movie/vote",
        type: 'POST',
        data: {"vote":p_vote, "id":p_id},
        success: function (data, textStatus, jqXHR) 
        {
        	console.log(data);
        }
    });
}