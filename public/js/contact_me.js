/*
  Jquery Validation using jqBootstrapValidation
  */
$(function() {

    $("#contactForm input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // something to have when submit produces an error ?
            // Not decided if I need it yet
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var nombre = $("input#nombre").val();
            var direccion = $("input#direccion").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var celPhone = $("input#celPhone").val();
            
            var datos= "nombre="+nombre+"&dir="+direccion+"&tel="+phone+"&cel="+celPhone+"&email="+email;
            
            var firstName = nombre; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "http://agendazf1.local/contacto/test/",
                dataType: 'html',
                async: true,
                type: "POST",
                contentType: 'application/x-www-form-urlencoded',
                data: datos,
                cache: false,
                success: function(response) {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Se guardo el contacto en la agenda. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                    //alert(response);
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Disculpe, el contacto " + firstName + " no fue guardado debido a problemas con el servidor...</strong> Intente más tarde.");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
