<header>

    <div class="container-fluid">
        <div class="bg-jt-image">
            <h1 class="text-center "> <a class="text-decoration-none font-weight-bold text-body" href="index.php?action=main">Johnson's Title</a> </h1>
            <h2 class ="font-italic font-weight-light text-center"> Everything you'll ever need</h2>
        </div>
    </div>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-end sticky-top">
        <a class="navbar-brand" href="index.php?action=main"> Johnson's Title </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <?php 
                if (isset($_SESSION['pseudo'])){
                ?>

                <!-- Dropdown -->
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     <?php echo $_SESSION['pseudo']; ?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?action=myProfile"> My profile </a>
                    <a class="dropdown-item" href="#"> Forum </a>
                    <a class="dropdown-item" href="#"> Orders</a>
                  </div>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logout"> Logout </a>
                </li>

                <?php
                } else {
                ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=register">Register</a>
                    </li>
                <?php
                }
                ?>

                <li class="nav-item"> 
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul> 
        </div>   
    </nav>
    
