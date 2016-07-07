function fill_table_data(data ,table_parm = '' , head_parm = 'class = "success"') //take the tall string and put its data in HTML table
{
    var rows = data.split("\n");
    var table = '<table ' + table_parm + ">"; 
    table = table + '<thead><tr ' + head_parm + ' >'; //will be solved later the head problem
    head = rows[0].split('\t');
    for(i in head)
    {
        table = table + '<th>' + head[i] + '</th>';
    }
    table = table + '</tr></thead>';
    //there is a problem in table head so it has been solved by considering it as a normal row
    for(var y in rows) {
    if(y == 0)
        continue;
    var cells = rows[y].split("\t");
    var row = '<tr> ';
    for(var x in cells) {
        row = row + '<td> '+cells[x]+' </td>' ;
    }
    row = row + '</tr>';
    table = table + row;
    }

    return table + "</table>";
}