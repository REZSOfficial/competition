<ul class="nav navbar-dark nav-tabs bg-dark p-1">
    <li class="nav-item d-sm-none d-md-block d-none d-sm-block">
      <a style="color: #C4AF9A !important" class="nav-link" onclick="routeToHome()" href="/">Home</a>
    </li>
    <li class="nav-item d-sm-none d-md-block d-none d-sm-block">
      <a style="color: #C4AF9A !important" class="nav-link" onclick="routeToCompetitions()" href="/competitions">Competitions</a>
    </li>
    <li class="nav-item dropdown d-none d-sm-block d-md-none d-block d-sm-none">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" onclick="routeToCompetitions()">Home</a>
        <a class="dropdown-item" onclick="routeToCompetitions()" role="button">Competitions</a>
      </div>
    </li>
  </ul>