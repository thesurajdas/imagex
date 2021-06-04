<nav class="navbar shadow-lg p-1 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" style="margin-left: 35px;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img style="height: 40px;" src="../img/logo.jpg" alt=""></a>
                <?php if (!isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i></button></a>
                    <div class="dropdown-menu" style="left: auto; right: 0;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="login.php">Sign In</a>
                    </div>   
                </div>
                <?php } ?>
                <?php if (isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></a>
                    <div class="dropdown-menu" style="left: auto; right: 0;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
                        <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                        <?php if ($row['admin']==1) {
                                    echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='../admin'>Admin Panel</a>";
                                } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Sign out</a>
                    </div>
                </div>
                <?php } ?>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php" tabindex="-1" aria-disabled="true" style="color: rgba(18, 18, 221, 0.699);"><i class="fad fa-home" style="color: rgba(18, 18, 221, 0.699);" ></i> Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="trendings.html" tabindex="-1" aria-disabled="true"><i class="fad fa-fire" style=" color: rgb(255, 22, 22);"></i> Trending</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle text-center" data-toggle="dropdown" style="padding-left: 15%;"><i class="fad fa-bars" style="color: rgba(136, 255, 0, 0.815);"></i> Category</button>
                                <ul class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a class="dropdown-item" href="abstract.html">Abstract</a></li>
                                    <li><a class="dropdown-item" href="art.html">Art</a></li>
                                    <li><a class="dropdown-item" href="animals.html">Animals</a></li>
                                    <li><a class="dropdown-item" href="anime.html">Anime</a></li>
                                    <li><a class="dropdown-item" href="astro.html">Astro</a></li>
                                    <li><a class="dropdown-item" href="black.html">Black</a></li>
                                    <li><a class="dropdown-item" href="bridge.html">Bridge</a></li>
                                    <li><a class="dropdown-item" href="cars.html">Cars</a></li>
                                    <li><a class="dropdown-item" href="city.html">City</a></li>
                                    <li><a class="dropdown-item" href="cloud.html">Cloud</a></li>
                                    <li><a class="dropdown-item" href="dark.html">Dark</a></li>
                                    <li><a class="dropdown-item" href="fashion.html">Fashion</a></li>
                                    <li><a class="dropdown-item" href="flowers.html">Flowers</a></li>
                                    <li><a class="dropdown-item" href="food.html">Food</a></li>
                                    <li><a class="dropdown-item" href="macro.html">Macro</a></li>
                                    <li><a class="dropdown-item" href="motorcycles.html">Motorcycles</a></li>
                                    <li><a class="dropdown-item" href="music.html">Music</a></li>
                                    <li><a class="dropdown-item" href="motion.html">Motion</a></li>
                                    <li><a class="dropdown-item" href="nature.html">Nature</a></li>
                                    <li><a class="dropdown-item" href="other.html">Other</a></li>
                                    <li><a class="dropdown-item" href="people.html">people</a></li>
                                    <li><a class="dropdown-item" href="sky">Sky</a></li>
                                    <li><a class="dropdown-item" href="sport.html">Sport</a></li>
                                    <li><a class="dropdown-item" href="street.html">Street</a></li>
                                    <li><a class="dropdown-item" href="technologie.html">Technologie</a></li>
                                    <li><a class="dropdown-item" href="texture.html">Texture</a></li>
                                    <li><a class="dropdown-item" href="travel.html">Travel</a></li>
                                </ul>
                            </div>
                        </li>    
                    </ul>
                    <form class="my-2 my-lg-0">
                        <div class="row no-gutters align-items-center">
                            <input class="form-control sbdr rounded-pill pr-5" type="text" placeholder="Search" id="example-search-input2">
                            <div class="col-auto">
                                <button class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5" type="button">
                                <i class="fad fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-success bt col-sm-12"><i class="fad fa-cloud-upload"></i> Upload</button></a>
                        </li>
                        <?php if (isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
                                    <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                                    <?php if ($row['admin']==1) {
                                        echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='../admin'>Admin Panel</a>";
                                    } ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Sign out</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (!isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none ">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning bt"><i class="fad fa-user-alt"></i></button></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login.php">Sign In</a>
                                </div>
                            </div>    
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>