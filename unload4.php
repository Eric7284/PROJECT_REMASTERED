<?php session_start();?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <span class="navbar-brand mx-auto">
      <a href="index.php?page=home">NoteMe</a>
    </span>

    <!-- OFFCANVAS TOGGLER for small screens -->
    <div class="d-lg-none">
      <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <img src="images/list.svg" alt="Menu" class="toggler-icon">
      </button>
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false"
           tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasMenuLabel">
            <a href="index.php?page=home">NoteMe</a>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <?php if (empty($_SESSION['user_id'])): ?>
            <li class="nav-item dropdown d-flex mb-2">
              <a class="nav-link dropdown-toggle" id="userButton" href="#" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                Hello!
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?page=login">Login</a></li>
                <li><a class="dropdown-item" href="index.php?page=signup">Sign Up</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item dropdown d-flex mb-2">
              <a class="nav-link dropdown-toggle" id="userButton" href="#" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                Hello <?= htmlspecialchars($_SESSION['username']); ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php endif; ?>

          <li class="list-group-item border-0 mb-2">
            <a href="index.php?page=topanime">Top</a>
          </li>
          <li class="list-group-item border-0 mb-2">
            Search
            <ul class="list-group mt-2 mb-2">
              <form class="d-flex" role="search" id="search">
                <input class="form-control me-2" type="search" placeholder="What's Anime?" aria-label="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </ul>
          </li>
          <li class="list-group-item border-0 mb-2">Deep Search</li>
          <li class="list-group-item border-0 mb-2">Watch</li>
          <li class="list-group-item border-0 mb-2">News</li>
          <li class="list-group-item border-0">
            <a href="index.php?page=about">About</a>
          </li>
        </div>
      </div>
    </div>

    <!-- COLLAPSED NAV for lg+ screens -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=topanime">Top</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Watch</a>
        </li>

        <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMINISTRATOR'): ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=form">Insert</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if (empty($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=signup">Sign Up</a>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
              Hello <?= htmlspecialchars($_SESSION['username']); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
