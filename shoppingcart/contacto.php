<?php
if (file_exists('../env.php')) {
	include_once '../env.php';
}

include_once '../config.php';


session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   <link rel="icon" href="../img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styleFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
   <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
<style>
    a {
        text-decoration: none;
    }
    #map {
	height: 40vw;
	width: 100%;
    }

</style>

    


<?php include 'header.php'; ?>
    
<?php include 'formulario.php';    ?>
   



<?php include 'footer.php'; ?>
   <!-- custom js file link  -->
   <script>
       function iniciarMap(){
    var coord = {lat:37.55293378997322 ,lng: -5.081764044766121};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
   </script>
    <script src="{{ asset('scripts/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>


    <script>
        $('document').ready(function () {
            var nameregx = /^[a-zA-Z ]+$/;
            $.validator.addMethod("validname", function (value, element) {
                return this.optional(element) || nameregx.test(value);
            });
            var eregex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            $.validator.addMethod("validemail", function (value, element) {
                return this.optional(element) || eregex.test(value);
            });
            var tlfregx = /^(6|7|9)([0-9][ -]*){8}$/;
            $.validator.addMethod("validtlf", function (value, element) {
                return this.optional(element) || tlfregx.test(value);
            });
        })
        $("#register-form").validate({
            rules:
            {
                name: {
                    required: true,
                    validname: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    validemail: true
                },
                tlf: {
                    required: true,
                    validtlf: true
                },
                asunto: {
                    required: true
                },
                descripcion: {
                    required: true,
                    minlength: 15
                }
            },
            messages:
            {
                name: {
                    required: "Por favor, indique un nombre de usuario.",
                    validname: "Solo se permiten letras y espacios en blanco.",
                    minlength: "El nombre es demasiado corto."
                },
                email: {
                    required: "Por favor, indique un email.",
                    validemail: "Introduzca un email correcto."
                },
                tlf: {
                    required: "Por favor, indique un telefono.",
                    validtlf: "Introduzca un número de telefono válido"
               },
                asunto: {
                    required: "Por favor, indique un asunto.",
                },
                descripcion: {
                    required: "Por favor, indique una descripción.",
                    minlength: "La descripción es demasiado corta."
                }
            },
            errorPlacement: function (error, element) {
                $(element).closest('.form-group').find('.help-block').html(error.html());
            },
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(element).closest('.form-group').find('.help-block').html('');
            },
            submitHandler: function (form) {
                form.submit();
                alert('ok');
            }
        });
    </script>

</body>

</html>