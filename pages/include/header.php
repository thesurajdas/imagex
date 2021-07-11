<style>

.navbar-toggler{
    border: none;
}
</style>
<header>
            <nav class="navbar shadow-lg p-1 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" style="margin-left: 35px;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img draggable="false" style="height: 40px;" src="../img/logo.svg" alt="" onContextMenu="return false;"></a>
                <?php if (!isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i></button></a>   
                </div>
                <?php } ?>
                <?php if (isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img draggable="false" class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>" alt="" onContextMenu="return false;" style="object-fit: cover;"></a>
                    <div class="dropdown-menu" style="left: auto; right: 0; top: 20; min-width: none; margin-right: 10px;" aria-labelledby="navbarDropdown">
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
                            <a class="nav-link" href="trending.php" tabindex="-1" aria-disabled="true" style="color: rgb(255, 22, 22)"><i class="fad fa-fire"></i> Trending</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle text-center" data-toggle="dropdown" style="font-weight: 400; color: rgb(13 150 4 / 89%); padding-right: inherit;"><i class="fad fa-list-alt"></i> Category</button>
                                <ul class="dropdown-menu scrollable-menu" role="menu" style="top: 100%">
                                <li><a class="dropdown-item" href="category.php?id=0">All Images</a></li>
                                <?php
                                    include('../connect.php');
                                    $sql="SELECT * FROM categories ORDER BY category ASC";
                                    $result_cat=$connect->query($sql);
                                    while($row_cat=$result_cat->fetch_assoc()):
                                ?>
                                    <li><a class="dropdown-item" href="category.php?id=<?php echo $row_cat['id']; ?>"><?php echo $row_cat['category']; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="users.php" tabindex="-1" aria-disabled="true" style="color: rgb(158 0 160);"><i class="fad fa-users-crown"></i> Users</a>
                        </li>    
                        <li class="nav-item active">
                            <a class="nav-link" href="map.php" tabindex="-1" aria-disabled="true" style="color: rgb(13 212 222);"><i class="fad fa-map-marked"></i> Map</a>
                        </li>    
                    </ul>
                    <form action="search.php" method="GET" class="my-2 my-lg-0">
                        <div class="row no-gutters align-items-center">
                            <input type="text" autocomplete="off" name="q" id="query" data-toggle="dropdown" class="form-control sbdr rounded-pill pr-5" placeholder="Search" <?php if(isset($_GET['q'])){echo "value='".$_GET['q']."' ";} ?> required>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5">
                                <i class="fad fa-search"></i>
                                </button>
                            </div>
                            <!-- Here autocomplete list will be display -->
                            <div id="search-box" class="dropdown-menu" style="top: 80%"><div class="dropdown-item"><i class="fad fa-info-circle" style="color: #3654a9"></i> Type Something...</div></div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-success bt col-sm-12"><i class="fad fa-cloud-upload"></i> Upload</button></a>
                        </li>
                        <?php if (isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img draggable="false" class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>" onContextMenu="return false;" style="object-fit: cover;"></a>
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
                            <a class="nav-link dropdown-toggle" href="login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i> Log IN</button></a>
                            </div>    
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
</header>