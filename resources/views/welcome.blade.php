<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
    <div class="card mb-5">
        <div class="card-header">
            Search
        </div>
        <div class="card-body">
{{--            <form action="{{route('film.search')}}" method="get">--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Godfather"  required>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <div class="mb-3">
                            <button type="button" onclick="load_film()"  class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>

{{--            </form>--}}

        </div>
    </div>

    <div class="app" id="app">
        <div class="spinner-border" role="status" id="loading">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>




</div>

<script>
    $(document).ready(function () {
        $('#loading').hide();
    });
    function load_film(){
        var f = $('#title').val();
        $("#ff").remove();
        $.ajax({
            url: '/film-search',
            datatype: "html",
            method: "post",
            data:{
                "title" : f,
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (response) {
                // alert('ssss');

                $('#loading').hide();
                $("#app").html(response);

                document.getElementById('film').value = '';
            },
            error: function(request,status,errorThrown) {
                alert(errorThrown + ' ' + status + ' ' + request)
            }
        })
    }
</script>
</body>
</html>
