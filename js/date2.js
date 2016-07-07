var months = ['يناير',"فبراير","مارس","ابريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر"];
	var rev_month = {};
	for(i in months)
		rev_month[months[i]] = parseInt(i)+1; //change month to integer
	var cur_date = new Date();
	var cur_day = cur_date.getDate();
	var cur_month_index =cur_date.getMonth();
	var cur_month = months[cur_date.getMonth()];
	var cur_year = cur_date.getFullYear();

function set_date(id)
{
	var date_id = id;
	var days = [31,28,31,30,31,30,31,31,30,31,30,31];

	var day_element = $("#" + date_id).find(".day");
	var month_element =  $("#" + date_id).find(".month");
	var year_element = $("#" + date_id).find(".year");



        for(var i = 2000 ; i > 1930 ; i--)
	    year_element.append("<option>" + (i) +"</option>");

	if(cur_year %4 == 0)
		{
			days[1] = 29;
		}
   for(i in months)
	{
		month_element.append("<option id = '"+ i +"'>" + months[i] + "</option>");
	}
	month_element.find("#" + cur_month_index).prop("selected" , "selected");

	change_month(cur_month_index , date_id , days);

	month_element.change(function()
		{
			var month_index = rev_month[month_element.find(":selected").text()];
			change_month(month_index , date_id , days);

		});
	year_element.change(function()
		{
			var selected_year = $('.year').find(":selected").text();
			if(selected_year %4 == 0)
				days[1] = 29;
			else
				days[1] = 28;
			month_element.find("#" + 0).prop("selected" , "selected");
			change_month(1 , date_id , days);
		});
	//select the current date
}

function change_month(month_index , date_id , days)
{
	var day_element = $("#" + date_id).find(".day");
	var month_element =  $("#" + date_id).find(".month");
	var year_element = $("#" + date_id).find(".year");

	var added = "";
			var days_of_month = days[month_index];
			for(i = 0 ; i < days_of_month ; i++)
	         {
		      added += "<option id = '"+(i+1)+"'>"  + (i+1) + "</option>";
	         }
	console.log(date_id); 
	day_element.html(added);
	day_element.find("#1").prop("selected" , "selected");
}

function date_change(handler , date_id)
{
	var day_element = $("#" + date_id).find(".day");
	var month_element =  $("#" + date_id).find(".month");
	var year_element = $("#" + date_id).find(".year");

	day_element.change(function()
		{
			handler();
		});
	month_element.change(function()
		{
			handler();
		});
	year_element.change(function()
		{
			handler();
		});
}

function get_selected_date(date_id)
{
	var day_element = $("#" + date_id).find(".day");
	var month_element =  $("#" + date_id).find(".month");
	var year_element = $("#" + date_id).find(".year");

	return year_element.find(":selected").text() + "-" + rev_month[month_element.find(":selected").text()] +
		           "-" + day_element.find(":selected").text();
}

function make_date(date_str)
{
	var date = sate_str.sp
}
function create_date_(date_id)
{
return  '<form class = "form-inline" role="form"	id = "'+date_id+'"> ' +
	'<div class = "form-group"><label class= "control-label">التاريخ:</label></div>'+
	'<div class = "form-group">'+
		'<select  class = "form-control day"></select>'+
	'</div>'+
	'<div class = "form-group" >'+
		'<select class = "form-control month"></select>'+
	'</div>'+
	'<div class = "form-group" >'+
		'<select  class = "form-control year"></select>'+
	'</div>'+
	'<div class = "form-group">'+
		
	'</div>'+
'</form>';
}

function create_date(date_id , label)
{
var res =   
		'<select  class = "form-control col-md-3 year"></select>'+
		'<select class = "form-control col-md-3 month"></select>'+
		'<select  class = "form-control col-md-3 day"></select>';
return res;
}
