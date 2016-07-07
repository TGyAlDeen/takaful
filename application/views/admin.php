<div class="dropdown" dir = 'rtl'>
  <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
  data-toggle="dropdown">
      Profile
      <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
      <li role="presentation" >
      <a role="menuitem" tabindex="-1" href="logout" id = "logout">Logout</a>
  </li>

  </ul>
</div>


<div class = "col-md-12">
	<div id = "tools" class = "col-md-12">
		<div class = "form-group col-md-4">
			<select class = "form-control" id = "search_type">
				<option id = "1">By Name</option>
				<option id = "2">By Health status</option>
				<option id = "3">By Blood Group</option>
			</select>
		</div>
		<div class = "form-group col-md-4" >
			<input type = "text" placeholder = "Search" class = "form-control" id = "search_query">
		</div>
		<div class = "form-group col-md-4">
			<button  class = "btn btn-success form-control" id = "search_button"> Search </button>
		</div>
		<!-- filter-->
		<div class = "form-group col-md-1">
			<label class = "label-control">Age from:</label>
		</div>
		<div class = "form-group col-md-1">
			<select class = "form-control" id = "age_from">
				<option selected = "selected">18</option>
				<?php
				for($i = 19 ; $i < 70 ; $i++)
				{
					echo '<option>' . $i . '</option>';
				}
				 ?>
			</select>
		</div>

		<div class = "form-group col-md-1">
			<label class = "label-control">to:</label>
		</div>

		<div class = "form-group col-md-1">
			<select class = "form-control" id = "age_to">
				<?php
				for($i = 18 ; $i < 69 ; $i++)
				{
					echo '<option>' . $i . '</option>';
				}
				 ?>
				 <option selected = "selected">70</option>
			</select>
		</div>
		<!--
		<div class = "form-group col-md-2" >
			<label class = "label-control">
				last donation date:
			</label>
		</div>

		<div class = "form-group col-md-2">
			<select class = "form-control" id = "last_donation_date">
				<option>opened</option>
				<option>3 months ago</option>
				<option>6 months ago</option>
				<option>9 months ago</option>
			</select>
		</div>
	-->

	</div>
	<div id = "data" class = "col-md-12">
	</div>
</div>

<script type="text/javascript">

$("#search_query").keyup(function(event){
    if(event.keyCode == 13) //Enter code
    {
        $("#search_button").click(); //triger click button function
    }
});

$("#search_button").click(function()
	{
		console.log("Hello all");
		var search_type = $("#search_type").find(":selected").attr("id");
		var search_query = $("#search_query").val();
		var age_from = $("#age_from").val();
		var age_to = $("#age_to").val();
		var last_donation_date = $("#last_donation_date").val();
		var data = 
		{
			'search_type':search_type ,
			 'search_query' : search_query ,
			  'age_from' : age_from , 
			  'age_to' : age_to , 
			  'last_donation_date' : last_donation_date
		};
		var url = "<?php echo base_url("index.php/load_admin_data"); ?>"
		$.post(url , data , function(rec_data , status)
			{
				$("#data").html(rec_data);
			});
	});
</script>