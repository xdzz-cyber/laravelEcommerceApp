<?php
  use App\Http\Controllers\ProductController;
  use Illuminate\Support\Facades\Session;

  $totalCartItemsCount = Session::get("client") ? ProductController::cartItemCountForClient() : 0;
  $clientName = Session::get("client")['name'] ?? "Client Authorization";  
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/shop">E-commerce shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/shop">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Orders</a>
        </li>
      </ul>
      <form class="d-flex mx-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar navbar-nav navbar-right">
        <li><a href="#" class="text-decoration-none">Cart({{$totalCartItemsCount}})</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{$clientName}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Session::has("client"))
            <li><a class="dropdown-item" href="/shop/logout">Logout</a></li>
            @else
            <li><a class="dropdown-item" href="/shop/login">Login</a></li>
            <li><a class="dropdown-item" href="#">Register</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>