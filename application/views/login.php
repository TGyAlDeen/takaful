<div class = "col-md-3"></div>
<div class = "col-md-6" align = "center">
<div class = "col-md-12 err">
	<?php
	  if(isset($err))
         echo $err;
     if(isset($not_log_msg))
        echo $not_log_msg;
	?>
</div>
<span>
	<BR><BR>فضلاً قم بتسجيل الدخول
</span>

<?php
$form_attributes = array('class' => 'form-horizontal' , 'role' => 'form');
echo form_open('login', $form_attributes);
?>

<div class = "form-group">
	<input type = 'text' id = 'email' name = 'email' placeholder = 'Email' class = 'form-control'>
</div>

<div class = "form-group">
	<input type = 'password' id = 'password' name = 'password' placeholder = 'password' class = 'form-control'>
</div>
<div class = "form-group">
<div class = "col-md-4">
<button class = 'btn-primary form-control' type = 'submit'>Log in</button>
</div>

<div class = "col-md-4">
<a class = '' type = 'submit' href = "register">new user?</button>
</div>

<div class = 'col-md-10'></div>
</div>

</form> <!-- the opened form above-->

</div>

<div class = "col-md-3"></div>
