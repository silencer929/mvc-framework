$(document).ready(()=>{
	var DOMAIN="http://localhost:8080/project"
	$(".login").on("submit",function(){
		var form=$(this),
			url= form.attr("action"),
			data={},
			method=form.attr("method");
		form.find('[name]').each(function(){
		var input=$(this),
			name=input.attr("name"),
			value=input.val();
			data[name]=value;
		});
		$.ajax({
			url: url,
			method: method,
			data: data,
			error: function(error){
				console.log("error");
			},
			success: function(response){
				if(response==="string"){
					window.location=DOMAIN+"/home"
				}
				else{
					var errors= $.parseJSON(response);
					$("#err1").text(errors.email);
					$("#err2").text(errors.password);
					$("#err3").text(errors.invalid);
				}
				
				
			}
		});
		return false;
	})
})