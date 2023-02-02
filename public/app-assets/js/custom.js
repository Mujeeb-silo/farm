function notifications(msg,type)
{
	let bcolor='';
	if(type=='success')
	{
	  bcolor='error';	
	}
	if(type=='error')
	{
	  bcolor='red';	
	}
	if(type=='info')
	{
	  bcolor='blue';	
	}
	if(type=='warning')
	{
	  bcolor='yellow';	
	}
	$.toast({
	  text : msg,
	  bgColor :bcolor,
	  position : 'top-right'
	});
	
	//https://github.com/kamranahmedse/jquery-toast-plugin
}

function dTable(obj)
{
	var dt = $("#"+obj.table_name).DataTable({
			searchDelay: 500,
			processing: true,
			serverSide: true,
			stateSave: false,
			destroy: true,
			searching:(obj.isSearch!=undefined)?obj.isSearch:true,
			select: {
				style: 'os',
				selector: 'td:first-child',
				className: 'row-selected'
			},
			ajax: {
				url:obj.url,
				type:obj.method,
				beforeSend: function () {
					$("#"+obj.table_name).LoadingOverlay("show", {
						background: "rgba(1, 56, 63, 0.5)"
					});
				},
				complete: function () {
					$("#"+obj.table_name).LoadingOverlay("hide");
				},
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data:(obj.dfunction!=undefined)?obj.dfunction:[] 
			},
			columns:obj.column,
			columnDefs:obj.actions,
			// Add data-filter attribute
		});
		
		window.req_tbl=dt;
		return dt;
}