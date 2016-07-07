<div class="reveal-modal" id = "donate">
	<div id = "doner_info">waiting...</div>
</div>

<div class = "reveal-modal" id = "donation_info">
	<textarea rows = "3" class = "form-control" placeholder = "Donation information" id = "donation_details"></textarea>
	<button class = "btn-success btn form-control close-reveal-modal" id = "submit_donation">Save</button>
</div>



<div class = "col-md-12">
	<p>Click on The person to Donate</p>
	<table class = "table table-boredred table-hover">
		<thead>
			<tr>
				<th>Doner Name</th>
				<th>Doner Age</th>
				<th>last Donation Date</th>
				<th>Blood Group</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($doners as $key => $doner) {
				$id = $doner['doner_id'];
				echo "<tr>";
				td($doner['full_name']);
				td($doner['age']);
				if($doner['donation_date'] != null)
				   td($doner['donation_date']);
				 else
				 	td('Not available');
				td($doner['blood_group']);
				td("<button class = 'btn-success details' info = '$id' data-reveal-id = 'donate'>Details</button>");
				td("<button class = 'btn-success donate_button' info = '$id' data-reveal-id = 'donation_info'>Donate</button>");
				echo "</tr>";
			}

			function td($data)
			{
				echo "<td>$data</td>";
			}
			?>
		</tbody>
	</table>
</div>

<?php
?>
<script type="text/javascript">

var last_id = null;
$(document).ready(function(){
    $('.details').click(function(){
    	var url = "<?php echo base_url("index.php/load_admin_data/get_doner_data"); ?>"
    	var data = {'id' : $(this).attr('info')};
    	$.post(url , data , function(rec_data , status)
    		{
    			rec_data = JSON.parse(rec_data);
    			console.log(rec_data);
    			rec_data = prepare(rec_data);
    			//console.log(rec_data);
    			$("#doner_info").html(rec_data);
    		});

    });
});

function prepare(data)
{
	//console.log(data);
	var tr_gender = {'M':'Male' , 'F' : 'Female'}
	var res = '<B>' + data['full_name'] + ' Details:</B><BR>------------------------<BR>';
	if(data['image'] != null)
	res += '<img src="' + '<?php echo base_url('images/profile/');?>/' + data['image'] + '"' + '/>';
	console.log(res);
	res += "<BR>";
	res += co_prepare('Date of Birth' , data['birth_date']);
	res += co_prepare('Blood Group' , data['blood_group']);
	res += co_prepare('Gender' , tr_gender[data['gender']]);
	res += co_prepare('phone number' , data['phone_number']);
	res += co_prepare('Alternative Phone Number' , data['alternative_phone']);
	if(data['donation_date'] != null)
	    res += co_prepare('Last Donation date' , data['donation_date']);
	else
		res += co_prepare('Last Donation date' , 'Not available');
	if(data['description'] != null)
	   res += co_prepare('last health status' , data['description']);
	else
		res += co_prepare('last health status' , 'Not available');
	return res;

}

function co_prepare(filed , data)
{
	return '<B>' + filed + '</B>:<BR>' + data + '<BR>';
}

$("#submit_donation").click(function()
	{
		var id = last_id;
		var info = $("#donation_details").val();
		var data = {'id' : id , 'info' : info};
		var url = "<?php echo base_url("index.php/save_admin_data/save_donation_data"); ?>"
		$.post(url , data , function(rec_data , status)
			{
				console.log(rec_data);
			});
	});

$(".donate_button").click(function()
	{
		last_id = $(this).attr('info');
	});
</script>