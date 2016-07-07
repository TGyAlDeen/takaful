<div class = "col-md-12">
	<div class = "form-group">
		<textarea class = "form-control" rows = "3" placeholder = "what is your current health status" id = "health_status">
		</textarea>
		<BR>
		<button class = "btn btn-success form-control" id = "save">
			save
		</button>
	</div>
	<div id = "history">
		Your history:<BR>
	</div>
</div>

<script type="text/javascript">


$("#save").click(function()
	{
		var url = "<?php echo base_url("index.php/update/status_updater"); ?>";
		var data = {'health_status' : $("#health_status").val()};
		$.post(url , data , function(rec_data , status)
		{
			if(rec_data ==  'saved')
			{
				add_to_history(new Date() ,$("#health_status").val());
			}
		});
	});
function get_history()
{
	var url = "<?php echo base_url("index.php/update/get_history") ?>";
	$.post(url , {} , function(rec_data , status)
	{
		rec_data = JSON.parse(rec_data);
		for(i in rec_data)
		{
			var data = rec_data[i];
			var date = data['st_date'];
			var desc = data['description'];
			add_to_history(date , desc);
		}
		//$("#history").html(rec_data);
	});
}

function add_to_history(date , desc)
{
	$("#history").append("<span class = 'tit'>" + date + "</span><BR>");
	$("#history").append(desc);
	$("#history").append("<BR>");
}
$("#health_status").html("");
get_history();

</script>