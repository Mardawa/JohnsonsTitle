<?php
require('./controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'main') {
        main();
    }
    elseif ($_GET['action'] == 'register') {
        register();
    }
    elseif ($_GET['action'] == 'login') {
        login();
    }
    elseif ($_GET['action'] == 'logout') {
        logout();
    }
    elseif ($_GET['action'] == 'myProfile') {
        myProfile();
    }
    elseif ($_GET['action'] == 'clothing') {
    clothing();
    } 
    elseif ($_GET['action'] == 'title') {
    title();
    }
    else {
        main();
    }
}
else {
    main();
}