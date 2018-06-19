<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-ststic-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('posts.index')}}">CodELog</a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    {{-- ajax Form Add Post--}}
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Post');
    });
    $("#add").click(function () {
        $.ajax({
            type:'POST',
            url:'store',
            data:{
                '_token':$('input[name=token]').val(),
                'title':$('input[name=title]').val(),
                'body':$('input[name=body]').val(),
            },
            success: function(data){
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.body);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='post" + data.id + "'>"+
                        "<td>" + data.id + "</td>"+
                        "<td>" + data.title + "</td>"+
                        "<td>" + data.body + "</td>"+
                        "<td>" + data.created_at + "</td>"+
                        "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                        "</tr>");
                }
            },
        });
        $('#title').val('');
        $('#body').val('');

    })</script>
    </body>
    </html>