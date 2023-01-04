<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="/home">Barbatos Shop</a>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Category
                        </a>
                        <ul class="dropdown-menu">
                          @foreach ($categoryData as $category)
                            <li><a class="dropdown-item" href="/category/{{$category->id}}">{{$category->name}}</a></li>
                          @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown ms-5 ps-5">
                        @if (!Auth::user())
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/register">Register</a>
                            </li>

                        @else
                            @if (Auth::user()->role == "admin")
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/manageProduct">Manage Product</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    @if (Auth::user()->role == "customer")
                                        <li><a class="dropdown-item" href="/cart">Cart</a></li>
                                        <li><a class="dropdown-item" href="/history">History</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href={{route("logout")}}>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div>@yield('content')</div>
</body>
</html>
