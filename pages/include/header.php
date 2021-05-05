<?php
    echo '<header>
    <nav class="navbar shadow-lg p-3 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="pages/fullimg.php" tabindex="-1" aria-disabled="true">Home</a>
                </li>
                <li class="nav-item dropdown border-right-0">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/nature.html">Nature</a>
                        <a class="dropdown-item" href="pages/potrait.html">Potraite</a>
                        <a class="dropdown-item" href="pages/landscape.html">Landscape</a>
                        <a class="dropdown-item" href="pages/astro.html">Astro</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/allimg.php" tabindex="-1" aria-disabled="true">Trending</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="login.php"><button type="button" class="btn btn-outline-warning">LogIn/SignUP</button></a>
                </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn btn-outline-info my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pages/upload.html" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-up"></i></button></a>
                </li>
                <li class="nav-item dropleft text-decoration-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></button></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/profile.html">Account</a>
                        <a class="dropdown-item" href="pages/editprofile.html">Edit Profile</a>
                        <a class="dropdown-item" href="pages/favimg.html">Saved Images</a>
                        <a class="dropdown-item" href="pages/usruploadimg.html">Your Uploads</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">SignOff</a>
                    </div>
                </li>
                <li class="nav-item dropleft text-decoration-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><i class="bi bi-emoji-expressionless-fill"></button></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/login.php">Sign In</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages/login.php">Sign UP</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>';
?>
