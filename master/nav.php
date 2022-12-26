<?php 

if (isset($_SESSION['user_id']) && isset($_SESSION['user_username']) ) { 
    if ($page=="admin" || $page == 'report' || $page == 'add-user' || $page == 'add-category' || $page == 'add-book' || $page == 'edit-category' 
    || $page == 'edit-author' || $page == 'edit-book' || $page == 'search') { ?>
<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand <?php if($page == "admin") echo "active"; ?>" href="./?page=admin">PSU-CRUD ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?php if ($page == "report") echo "active";?> " aria-current="page"
                    href="./?page=report">Report</a>
                <a class="nav-link <?php if ($page == "add-user") echo "active"; ?>" href="./?page=add-user">Add
                    User</a>

                <a class="nav-link" href="./logout.php">logout</a>

            </div>
        </div>
    </div>
</nav>
<?php } ?>

<?php }else { ?>
<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="./login.php">PSU-CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-link" href="./login.php">login</a>

            </div>
        </div>
    </div>
</nav>

<?php } ?>