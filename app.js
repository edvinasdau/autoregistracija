$.getJSON("carss.php", function(result){
    $.each(result['cars'], function(i, field){
        $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
    });
});
    
$("#ajax_post").click(function(){

    $.post("carss.php",// endpoint
    { // payload
        owner: $("#owner").val(),
        make: $("#make").val(),
        model: $("#model").val(),
        license: $("#license").val()
    },
    function(data, status){

        $("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
           
        $.getJSON("carss.php", function(result){

            $("#user_table_body").html('');
            $.each(result['cars'], function(i, field){
                $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
            });
        });
    });
});

$("#search").keyup(function() {

    $.getJSON("carss.php",
    {
        search: $("#search").val(),
    },
    function(result){

        $("#user_table_body").html('');
        $.each(result['cars'], function(i, field){
            $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
        });
    });

});

$("#last5").click(function() {

    $.getJSON("carss.php",
    {
        last: 5,
    },
    function(result){

        $("#user_table_body").html('');
        $.each(result['cars'], function(i, field){
            $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
        });
    });

});