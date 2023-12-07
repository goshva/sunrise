<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("public/css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("public/css/test-details.css") }}">
    <link rel="stylesheet" href="{{ asset("public/css/test.css") }}">
    <link rel="stylesheet" href="{{ asset("public/css/chat.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/learning_material.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/learning_materials.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/statistic.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/learnin.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/test-status.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/competetion-status.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/admin-literature.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/admin-reposts.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/roles.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/auth.css") }}">

@livewireStyles()   

    <title>Document</title>
</head>
<body>
    
    <div class="wrapper">
            @yield('code')
    </div>
@livewireScripts()
<x-footer></x-footer>

</body>
</html>