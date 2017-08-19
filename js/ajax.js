function remove(name)
{
	//grab values
	var eid = $_SESSION['eid'];
	
	//perform http request
	$.post('delete_entry.php', { name:name, eid:eid }, function(data){
		if(data == 'success')
		{
			location.reload(true);
		}
		else
		{
			alert(data);
		}
		
	});
}