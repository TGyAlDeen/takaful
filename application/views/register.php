<div class = "col-md-3"></div>
<div class = "col-md-6">
	<div class = "col-md-12">
<div class = "col-md-12 err">
	<?php
	  if(isset($err))
      echo $err;
	?>
</div>
<?php
$form_attributes = array('class' => 'form-horizontal' , 'role' => 'form');
echo form_open('register', $form_attributes);
?>

<div class = "form-group">
	<input type = 'text' id = 'name' name = 'name' placeholder = 'Full Name' class = 'form-control' value="<?php echo $name;?>"; >
</div>

<div class = "form-group">
	<input type = 'text' id = 'email' name = 'email' placeholder = 'Email' class = 'form-control'  value="<?php echo $email; ?>">
</div>

<div class = "form-group">
	<input type = 'password' id = 'password' name = 'password' placeholder = 'password' class = 'form-control'>
</div>

<div class = "form-group">
	<input type = 'password' id = 're_password' name = 're_password' placeholder = 'password again' class = 'form-control'>
</div>
<div class = "information">
	-----------------------------------------<BR>	
</div>

<div class = "form-group">
	<label class = "label-control">
		Gender:
	</label>
	<select  id = 'gender' name = 'gender' class = 'form-control'>
		<option info = 'M'>Male</option>
		<option info = 'F'>Female</option>
	</select>
</div>
<div class = "form-group">
	<input type = 'text' id = 'phone' name = 'phone' placeholder = 'Phone Number' 
	class = 'form-control' value = "<?php echo $phone; ?>" >
</div>
<div class = "form-group">
<label class = "label-control">Date Of Birth:</label>
</div>
<div class = "form-inline form-group" id = "birthDate">
</div>

<input type = "hidden" id = "dateOfBirth" name = "dateOfBirth"></input>

<div class = "form-group">
	<label class = "label-control">Blood Group</label>
	<select id = "blood_group" name = "blood_group" class = "form-control">
		<option>O+</option>
		<option>O-</option>
		<option>A+</option>
	</select>
</div>

<div class = "form-group">
<div class = "col-md-6">
<button class = 'btn-primary form-control' type = 'submit' id = "submit">Submit</button>
</div>
<div class = 'col-md-10'></div>
</div>

</form> <!-- the opened form above-->
</div>

</div>

<div class = "col-md-3"></div>


<!--Scripts-->
<script type="text/javascript" src="<?php echo base_url("js/date2.js");?>"></script>
<script type="text/javascript">
$("#birthDate").append(create_date("date"));
set_date("birthDate");
$("#submit").click(function()
	{
		$("#dateOfBirth").val(get_selected_date("birthDate"));
	});
</script>