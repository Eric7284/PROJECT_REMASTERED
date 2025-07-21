<?php session_start();?>
<nav class="navbar navbar-expand-lg bg-body-teritary">
    <div class="container">
        <span class="navbar-brand mx-auto"><a href="/PROJECT_REMASTERED/home">NoteMe</a></span>
        
        <div class="d-lg-none">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling">
                <span class="toggler-icon"><img src="images/list.svg" alt="Menu"></span></button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false"tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" >
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><a href="/PROJECT_REMASTERED/home">NoteMe</a>
                    </h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div><!--saat layar kecil-->
                <div class="offcanvas-body">
                    <?php if (empty($_SESSION['user_id'])):?>
                        <li class="nav-item dropdown d-flex ms-2 mb-2">
                            <a class="nav-link dropdown-toggle" id="userButton" href="#" role="button"data-bs-toggle="dropdown" aria-expanded="false">Hello!, <?= ($_SESSION['username']); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="login" href="/PROJECT_REMASTERED/login">Login</a></li>
                                <li><a class="dropdown-item" id="signup" href="/PROJECT_REMASTERED/signup">Sign Up</></li>
                            </ul>
                        </li>
                        <?php else: ?>
                            <li class="nav-item dropdown d-flex ms-2 mb-3">
                                <a class="nav-link dropdown-toggle" id="userButton" role="button"data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, <?= ($_SESSION['username']); ?></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                                <li class="list-group-item  ms-2 mb-3"><a href="/PROJECT_REMASTERED/top">Top</a></li>
                                <li class="list-group-item  ms-2 mb-3"><a href="/PROJECT_REMASTERED/watch">Watch</a></li>
                                <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMINISTRATOR'): ?>
                                    <a class="nav-link ms-2 mb-3" href="/PROJECT_REMASTERED/form">Insert</a>
                                    <?php endif; ?>
                                    <li class="list-group-item ms-2 mb-3"><a href="/PROJECT_REMASTERED/news">News</a></li>
                                    <li class="list-group-item ms-2 mb-3"><a href="/PROJECT_REMASTERED/contact-us">Contact Us</a></li>                
                    <li class="list-group-item ms-2 mb-3"><a href="/PROJECT_REMASTERED/about">About</a></li>
                    <button type="button" class="btn rounded-circle d-flex align-items-center justify-content-center btn-transparent"style="width: 50px; height: 50px;" id="switchTheme1"><img src="images/brightness-high.svg" id="themeIcon" alt="icon">
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/PROJECT_REMASTERED/top">Top</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PROJECT_REMASTERED/watch">Watch</a>
                </li>
                <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMINISTRATOR'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/PROJECT_REMASTERED/form">Insert</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/PROJECT_REMASTERED/news">News</a>
                </li>
                <li class="nav-item">
                    <li class="nav-link"><a href="/PROJECT_REMASTERED/contact-us">Contact Us</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PROJECT_REMASTERED/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
            <?php if (empty($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="dropdown-item me-2" href="/PROJECT_REMASTERED/login">Login</a>
                </li>
            <li class="nav-item">
                <a class="dropdown-item ms-2" href="/PROJECT_REMASTERED/signup">Sign Up</a>
            </li>
            <?php else: ?>
            <li class="nav-item dropdown d-flex">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"aria-expanded="false">Hello, <?= ($_SESSION['username']); ?></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
            <?php endif; ?>
            </ul>
            <!--onclick="switchTheme(this)" -->
            <button type="button" class="btn rounded-circle d-flex align-items-center justify-content-center btn-transparent"style="width: 50px; height: 50px;" id="switchTheme"><img src="images/brightness-high-1.svg" id="themeIcon" alt="icon">
        </div>
        <script>
        document.getElementById('switchTheme').addEventListener('click',()=>{
            let theme = document.documentElement.getAttribute('data-bs-theme');
            if (theme == 'light') { 
                document.documentElement.setAttribute('data-bs-theme','dark');
                document.body.classList.add('bg-dark', 'text-white');  // Tambahkan class dark mode
                document.body.classList.remove('bg-light', 'text-dark');
                document.getElementById('themeIcon').src = "images/crescent-moon.png"
            }
            else {
                document.documentElement.setAttribute('data-bs-theme','light');
                document.body.classList.add('bg-light', 'text-dark');  // Tambahkan class light mode
                document.body.classList.remove('bg-dark', 'text-white');
                document.getElementById('themeIcon').src = "images/brightness-high.svg"
            }
        });
        document.getElementById('switchTheme1').addEventListener('click',()=>{
            let theme = document.documentElement.getAttribute('data-bs-theme');
            if (theme == 'light') { 
                document.documentElement.setAttribute('data-bs-theme','dark');
                document.body.classList.add('bg-dark', 'text-white');  // Tambahkan class dark mode
                document.body.classList.remove('bg-light', 'text-dark');
                document.getElementById('themeIcon').src = "images/crescent-moon-1.png"
            }
            else {
                document.documentElement.setAttribute('data-bs-theme','light');
                document.body.classList.add('bg-light', 'text-dark');  // Tambahkan class light mode
                document.body.classList.remove('bg-dark', 'text-white');
                document.getElementById('themeIcon').src = "images/brightness-high-1.svg"
            }
        });
        </script>
        </button>
    </div>
</nav>