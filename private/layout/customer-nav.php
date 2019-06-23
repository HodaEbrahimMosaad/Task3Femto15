<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if($customer_session->is_logged_in()){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="../../public/customers/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../public/customers/logout.php">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>