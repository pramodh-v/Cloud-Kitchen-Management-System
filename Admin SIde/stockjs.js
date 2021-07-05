function addRow(id)
{
	var tab = document.getElementById(id);
	var rowCount = tab.row.length;
	var row = tab.insertRow(rowCount);
	var col = tab.rows[0].cells.length;
	for(var i=0;i<col;i++)
	{
		var newCell = row.insertCell(i);
		newCell.innerHTML = tab.rows[0].cells[i].innerHTML;
	}
}