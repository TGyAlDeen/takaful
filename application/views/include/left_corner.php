<div class = "col-md-3 corner" align = "left">

	<?php
	if(isset($left_links))
	{
		foreach($left_links as $key => $link)
		{
			echo "<button class = 'btn-success form-control btn-lg' id = '$key'> $link </button>";
		}
	}
	?>


</div>
<!--open the main page div from here-->
<div class = "col-md-9 center"> <!--will be closed in right corner-->
