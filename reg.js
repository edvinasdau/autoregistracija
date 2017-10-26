$("#reg").click(function(){

	$.post("register.php",
		{
			owner: $("#username").val(),
			license: $("#password").val(),
		})
});