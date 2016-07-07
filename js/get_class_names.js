var url = "";
function set_base_url(u)
{
	url = u;
}
function get_class_names(class_name , class_id)
{
	var names_to_number = {};
	names_to_number['الأول'] = 1;
	names_to_number['الثاني'] = 2;
	names_to_number['الثالث'] = 3;
	names_to_number['كل الصفوف'] = 0;
	var data = "";//= 'something';
	if(url == "")
		url = "get_class_names/index/";
	class_name = names_to_number[class_name]; //change it to numerical value
	$.post(url + class_name , null , function(rec_data , status)
			{
				$(class_id).html(rec_data);
			});
	//hhhh
}