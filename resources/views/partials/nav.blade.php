<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <div class="container flex justify-content-between">
      <a class="navbar-link" href="{{ route('home') }}">
        <img class="h-32px" src="{{ url('assets/images/logo-white.png') }}" alt="Laracuss Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-0 mx-lg-3">
          <li class="nav-item d-block d-lg-none d-xl-block">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Discussions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-nowrap" href="#">About Us</a>
          </li>
        </ul>
        <form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="#" method="GET">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><img src="{{ url('assets/images/magnifier.png') }}" alt="Search"></span>
                <input class="form-control border-start-0 ps-0" type="search" placeholder="Search" aria-label="Search" name="" value="">
            </div>
        </form>
        <ul class="navbar-nav ms-auto my-2 my-lg-0">
            <li class="nav-item my-auto">
                <a class="nav-link text-nowrap" href="#">Log In</a>
            </li>
            <li class="nav-item ps-1 pe-0">
                <a class="btn btn-primary-white" href="#">Sign Up</a>
            </li>
        </ul>
      </div>
    </div>
</nav>