$.getJSON("cars.php", function(result){
	$("#user_table_body").html('');
	$.each(result['cars'], function(i, field){
		$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
	});
});



$("#ajax_post").click(function(){

	$.post("cars.php",
	{
		owner: $("#form_owner").val(),
		license: $("#form_license").val(),
		model: $("#form_model").val(),
		make: $("#form_make").val(),
		//date: $("#form_date").val(),
	},
	function(data, status){

		$("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
		$.getJSON("cars.php", function(result){

			$("#user_table_body").html('');
			$.each(result['cars'], function(i, field){
				$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td></tr>");
			});
		});
	});

});


$("#last10").click(function(){
	$.getJSON("cars.php",
	{
		last101: $("#last10").val(),
	},
	function(result){

		$("#user_table_body").html('');
		$.each(result['cars'], function(i, field){
			$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
		});
	});
});	


$("#search").keyup(function(){
	$.getJSON("cars.php",
	{
		search: $("#search").val(),
	},
	function(result){

		$("#user_table_body").html('');
		$.each(result['users'], function(i, field){
			$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
		});
	});
});	


