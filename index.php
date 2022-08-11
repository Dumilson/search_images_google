<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .header {
            text-align: center;
            margin-top: 45px !important;
            padding: 15px 25px;
        }

        .img-code {
            object-fit: cover;
            height: auto;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Digite Alguma Coisa E Clique Enter</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-4">
                <input type="search" id="search" class="form-control form-control-lg" placeholder="Escreva Algo Aqui" onkeyup="getSearch(this)">

                <h1 class="text-center text-info mt-5" id="info"></h1>
            </div>
        </div>

        <div class="row" id="images_search">
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("#search").on('keypress', function(e) {
                if (e.keyCode == 13) {
                    $.ajax({
                        type: "GET",
                        url: "/Classes/GetImages.php?url=" + $("#search").val(),
                        dataType: "html",
                        beforeSend: function(){
                            $("#info").html("Pesquisando ...")
                            $("#images_search").html("")
                            $("#search").attr("disabled",true)
                        },
                        success: function(response) {
                            $("#info").html("")
                            $("#search").attr("disabled",false)
                            $("#images_search").html(response)
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>