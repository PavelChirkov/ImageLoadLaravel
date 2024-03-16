<!DOCTYPE html>
<html>
<head>
    <title>Загрузка изображений на Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Меню</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Загрузка изображений</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('info') }}">Просмотр загруженных изображений</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apiAll') }}">Api (все изображения)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="panel panel-primary">
        @yield('content')
    </div>
</body>
</html>
