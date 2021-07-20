

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ebeced;">
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
            <a class="nav-link" href="{{url('/json')}}" target="_blank">Json</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
