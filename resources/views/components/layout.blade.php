<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ mix('js/app.js') }}" defer type="text/javascript"></script>

</head>
<body class="bg-light">
    
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="https://ui-avatars.com/api/?size=128&name={{$user->name}}&bold=true&background=random" alt="{{$user->name.' avatar'}}"  width="30" height="24">
                {{$user->name}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <form action="logout" method="POST">
                                @csrf
                                <a class="dropdown-item" onclick="this.closest('form').submit()" href="#">Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    @endauth

    {{$slot}}
    
</body>
</html>