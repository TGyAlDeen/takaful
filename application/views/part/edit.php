<div class = "col-md-12 basic_info">

<span class = "large">Basic information: </span>
	<div class = "form-group edit">
		<label class = "label-control">Name:</label>
		<input type = "text" class = "form-control" value = "<?php echo $name; ?>" id = "full_name">
		<label class = "label-control">Phone Number:</label>
		<input type = "text" class = "form-control" value = "<?php echo $phone; ?>" id = "phone">
		<label class = "label-control">Extra Phone Number:</label>
		<input type = "text" class = "form-control" value = "<?php echo $extra_phone; ?>" id = "extra_phone">
		<BR>
		<button class = "btn btn-success form-control" id = "save_basic_info">Save Basic Information</button>
	</div>


	<span class = "large"> Health information:</span>

	<div class = "form-group">
	<label class = "label-control">Blood Group</label>
	<select id = "blood_group" name = "blood_group" class = "form-control">
		<option>O+</option>
		<option>O-</option>
		<option>A+</option>
	</select>
    </div>

   <div class = "form-group">
   <label class = "label-control">Date Of Birth:</label>
   </div>
   <div class = "form-inline form-group" id = "birthDate">
   </div>
   <input type = "hidden" id = "dateOfBirth" name = "dateOfBirth">
   <BR><BR>
   <button class = "btn btn-success form-control" id = "save_health_info">Save Health Information</button>



</div>


<!--Scripts-->
<script type="text/javascript" src="<?php echo base_url("js/date2.js");?>"></script>
<script type="text/javascript">
$("#birthDate").append(create_date("date"));
set_date("birthDate");

$("#save_health_info").click(function()
	{
		$("#dateOfBirth").val(get_selected_date("birthDate"));
		var url = "<?php echo base_url("index.php/update/update_health_info"); ?>";
		var data = {'blood_group':$("#blood_group").val() , 
	                'Birth' : $("#dateOfBirth").val() , };
	    $.post(url , data , function(rec_data , status)
	    	{
	    		show_msg(rec_data);
	    	});
	});
</script>


   
<script type="text/javascript">

$("#save_basic_info").click(function()
	{
		send_name($("#full_name").val() , $("#phone").val() , $("#extra_phone").val());
	});

function upload_photo()
{

}
function send_name(name , phone , extra_phone)
{
	var url = "<?php echo base_url("index.php/update/update_basic_info"); ?>";
	var data = {'name' : name ,'phone': phone , 'extra_phone' : extra_phone};
	$.post(url , data , function(rec_data , status)
		{
			console.log(rec_data);
		});
}

function save_msg()
{

}
</script>