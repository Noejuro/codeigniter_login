(function($){
    $("#frm_login").submit(function(ev){
        $("#alert").html("");
        $.ajax({
            url: 'login/validate',
            type: 'POST',
            data: $(this).serialize(),
            success: function(data){
                var json = JSON.parse(data);
                console.log(json)
            },
            statusCode: {
                400: function(xhr){
                    $("#email > input").removeClass("is-invalid");
                    $("#password > input").removeClass("is-invalid");
                    var json = JSON.parse(xhr.responseText);
                    if(json.email.length != 0){
                        $("#email > div").html(json.email);
                        $("#email > input").addClass('is-invalid');
                    }
                    if(json.password.length != 0){
                        $("#password > div").html(json.password);
                        $("#password > input").addClass('is-invalid');
                    }   
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);
                    console.log("Hiiii", json);
                    $("#alert").html('<div class="alert alert-danger" role="alert">'+ json.message +'</div>')
                }
                
            }
        });
        ev.preventDefault();
    });
})(jQuery)