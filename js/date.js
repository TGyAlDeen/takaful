var months = ['يناير',"فبراير","مارس","ابريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر"];
	var rev_month = {};
	for(i in months)
		rev_month[months[i]] = i; //change month to integer
	var days = [31,28,31,30,31,30,31,31,30,31,30,31];

set_date();
function set_date()
{
	var cur_date = new Date();
	var cur_day = cur_date.getDate();
	var cur_month_index =cur_date.getMonth();
	var cur_month = months[cur_date.getMonth()];
	var cur_year = cur_date.getFullYear();
	    $("#year").append("<option>" + (cur_year -1) +"</option>");
		$("#year").append("<option selected='selected'>" + cur_year + "</option>");
		$("#year").append("<option>" + (cur_year+1) + "</option>");
		$("#year").append("<option>" + (cur_year+2) + "</option>");
	if(cur_year %4 == 0)
		{
			days[1] = 29;
		}
	for(i in months)
	{
		var month_id = "month_" + i;
		$("#month").append("<option id = '" + month_id + "''>" + months[i] + "</option>");
	}
	$("#month_" + cur_month_index).prop("selected" , "selected");
	change_month(cur_month_index);
	$("#day_"+cur_day).prop("selected" , "selected");

	$("#month").change(function()
		{
			var month_index = rev_month[$('#month').find(":selected").text()];
			change_month(month_index);

		});
	$("#year").change(function()
		{
			var selected_year = $('#year').find(":selected").text();
			if(selected_year %4 == 0)
				days[1] = 29;
			else
				days[1] = 28;
			change_month(rev_month[$('#month').find(":selected").text()]);
		});
}

function change_month(month_index)
{
			var added = "";
			var days_of_month = days[month_index];
			for(i = 0 ; i < days_of_month ; i++)
	         {
		      var day_id = "day_" + i;
		      added += "<option id = '" + day_id +"'>"  + (i+1) + "</option>";
	         }
	          $("#day").html(added);
}

function date_change(handler)
{
	$("#day").change(function()
		{
			handler();
		});
	$("#month").change(function()
		{
			handler();
		});
	$("#year").change(function()
		{
			handler();
		});
}

function get_selected_date()
{
	return $('#year').find(":selected").text() + "-" + rev_month[$('#month').find(":selected").text()] +
		           "-" + $('#day').find(":selected").text();
}