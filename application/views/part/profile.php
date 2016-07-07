<?php 
          $img_ext = base_url('images/profile');
	       if(!isset($img))
	          $img_ext = $img_ext . '/default.jpg';
	       else
	           $img_ext = $img_ext . "/$img";
?>
<div class ="col-md-12 msg" id = "msg">
</div>
<div class= "col-md-12" id = "viewer">
<div class= "col-md-4" id = 'image_part' align = "left">
	<img src ="<?php echo $img_ext; ?>" width = "40%" hight = "40%" class="img-responsive" alt="Responsive image">
	<BR>
</div>
<div class = "col-md-4" id = 'data_part' align = "left">
	<B>Name: </B> <?php show_variable($name); ?>
	<BR>
	<B>Gender: </B> <?php show_variable($gender); ?>
	<BR><B>Phone Numbers:</B>
	       <?php
	       show_variable($phone . '  ');
	       show_variable($extra_phone);
	       ?>
	<BR><B>Blood Group: </B> <?php show_variable($blood_group); ?>
	<BR>
	<B>Birth Date: </B>
		<?php echo $birth_date ; ?>
</div>
</div>

<?php
function show_variable($var)
{
	if(isset($var))
		echo $var;
}
?>
