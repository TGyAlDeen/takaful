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


<div class = "col-id-12" id = "viewer">
</div>
<script type="text/javascript">
$(':button').click(function()
	{
		switch(this.id)
		{
			case '1':
			load_profile_viewer();
			break;
			case '2':
			load_data_editor();
			break;
			case '3':
			load_settings_editor();
			break;
			case '4':
			load_status_updater();
			break;
			case '5': 
			load_photo_updater();
			break;
		}
	});

function load_profile_viewer()
{
	var url = "<?php echo base_url("index.php/load_partial_view/profile_viewer");?>";
	$.post(url , {} , function(rec_data , status)
		{
			$("#viewer").html(rec_data);
		});
}
function load_data_editor()
{
	var url = "<?php echo base_url("index.php/load_partial_view/eidt_data");?>";
	$.post(url , {} , function(rec_data , status)
		{
			$("#viewer").html(rec_data);
		});
}
function load_settings_editor()
{
	var url = "<?php echo base_url("index.php/load_partial_view/load_settings");?>";
	$.post(url , {} , function(rec_data , status)
		{
			$("#viewer").html(rec_data);
		});
}
function load_status_updater()
{
	var url = "<?php echo base_url("index.php/load_partial_view/status_updater");?>";
	$.post(url , {} , function(rec_data , status)
		{
			$("#viewer").html(rec_data);
		});
}

function load_photo_updater()
{
	var url = "<?php echo base_url("index.php/load_partial_view/photo_updater/do_upload");?>";
	$.post(url , {} , function(rec_data , status)
		{
			$("#viewer").html(rec_data);
		});
}
load_profile_viewer();
</script>