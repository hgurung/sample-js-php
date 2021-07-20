

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ebeced;" id="navBar">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('list')) ? 'active' : '' }}" aria-current="page" href="{{url('/list')}}">List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('create')) ? 'active' : '' }}" aria-current="page" href="{{url('/create')}}">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/json')}}" target="_blank">Json</a>
        </li>

        <!-- Change Class -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Background
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item navbar-menu" data-class-name="default" href="#">Default</a></li>
            <li><a class="dropdown-item navbar-menu" data-class-name="blue" href="#">Blue</a></li>
            <li><a class="dropdown-item navbar-menu" data-class-name="green" href="#">Green</a></li>
          </ul>
        </li>
        <!-- Change class -->

      </ul>
    </div>
  </div>
</nav>
