function notification(obj)
{
	/*$.toast({
		title:(obj.hasOwnProperty('title'))?obj.title:'',
		content:(obj.hasOwnProperty('msg'))?obj.msg:'',
		type: (obj.hasOwnProperty('type'))?obj.type:'info',
		delay: (obj.hasOwnProperty('delay'))?obj.delay:5000
	  });*/
	  
	swal({
		title:(obj.hasOwnProperty('title'))?obj.title:'',
		text: (obj.hasOwnProperty('msg'))?obj.msg:'',
		icon: (obj.hasOwnProperty('type'))?obj.type:'info',
		
	  })
	
}