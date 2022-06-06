<?php
    session_start();
    if (isset($_SESSION['MEMBER'])) {
        $user = $_SESSION['MEMBER'];
        $role = $user['role'];
    }else{
        $user = '';
        $role = '';
    }
    require_once 'koneksi.php';
    require_once 'content/models/TypeFilm.php';
    require_once 'content/models/Genre.php';
    require_once 'content/models/GenreFilm.php';
    require_once 'content/models/Film.php';
    require_once 'content/models/Member.php';
    require_once 'content/models/ReqUR.php';
    require_once 'content/models/Rating.php';


    $objtf = new TypeFilm();
    $typefilm = $objtf->getAll();
    $objgr = new Genre();
    $genre = $objgr->getAll();
    $objf = new Film();
    $film = $objf->getAll();
    $objgm = new GenreFilm();
    $genrefilm = $objgm->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naifilm</title>
    <link rel="icon" type="image/x-icon" href="content/img/icon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#630606",
                    primary2: "#890F0D",
                    secondary: "#E83A14",
                    secondary2: "#D9CE3F",
                },
            }
        }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .card {
                @apply lg:w-3/12 sm:w-1/2 w-full rounded-lg p-3;
            }
            .card-cover {
                @apply w-full drop-shadow-2xl;
            }
            .card-header {
                @apply overflow-hidden rounded-t-lg;
            }
            .card-image {
                @apply ease-out duration-300 delay-100 h-[400px] w-full;
            }
            .card-body {
                @apply bg-gradient-to-b from-white/60 to-transparent p-3 rounded-b-lg;
            }
            .icon-dropdown {
                @apply transition ease-in-out duration-300;
            }
            .paglink {
                @apply px-2 bg-secondary2 text-secondary font-bold;
            }
            .active {
                @apply px-2 text-secondary2 bg-secondary font-bold;
            }
            #navicon {
                @apply text-3xl pr-3 text-secondary2;
            }
            .navbar-fixed {
                @apply fixed w-full z-[9999] bg-opacity-70 backdrop-blur-sm;
                box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
            }
            .nav-link {
                @apply md:text-xl text-base font-bold uppercase text-secondary2 my-4 ml-3 hover:text-secondary;
            }
            .drop-link {
                @apply pl-4 md:text-xl text-base font-bold uppercase text-secondary2 my-4 ml-3 hover:text-white;
            }
            .nav-link,
            .dd-link {
                @apply hover:bg-secondary2 py-2 px-4 rounded-l-full;
            }
            .dd-link {
                @apply md:text-base text-sm font-bold  text-secondary2 my-4 ml-5 hover:text-secondary;
            }
            .link-active {
                @apply bg-secondary2 py-2 px-4 rounded-l-full text-secondary;
            }

            label {
                @apply text-secondary2 text-xl font-bold;
            }
            select,
            input[type="text"],
            input[type="number"],
            input[type="email"],
            input[type="password"],
            textarea {
                @apply bg-transparent px-5 py-2 text-secondary2 border-2 border-secondary2 focus:border-2 focus:ring-secondary2 focus:border-secondary2 rounded-lg  focus:outline-none;
            }
            input[type="checkbox"] {
                @apply appearance-none h-4 w-4 border border-yellow-300 rounded-sm bg-secondary  checked:bg-secondary2 checked:border-secondary indeterminate:bg-primary focus:outline-none transition duration-200;
            }
            select > option {
                @apply bg-primary2 focus:border-secondary2 text-center hover:bg-secondary2 hover:text-white;
            }
            select > option:disabled {
                @apply bg-primary text-white;
            }
            input[type="file"] {
                @apply file:rounded-lg file:py-2 file:px-4 file:border-secondary2 file:bg-primary2 file:hover:bg-primary file:cursor-pointer file:text-secondary2  file:mr-4 text-secondary2;
            }

            .invalid-input {
                @apply text-secondary font-bold md:ml-60 w-4/6 mb-2;
            }
            /* .search {
                    @apply border-r-0 !important;
                } */
        }
    </style>
    <link rel="stylesheet" href="content/css/style.css">
</head>
    <div class="fixed"></div>
    <?php
    include_once 'content/frontend/navbar.php';
    
    $hal = (isset($_GET['hal'])) ? $_GET['hal'] : "home";
        if($hal == 'home'){
            include_once 'content/frontend/home.php';
        }
        else if(!empty($hal)){
            include_once $hal.'.php';
        }
        else{
            include_once 'content/frontend/home.php';
        }
    
    include_once 'content/frontend/footer.php'
    ?>
    <script src="https://kit.fontawesome.com/f35e05926b.js" crossorigin="anonymous"></script>
    
    <script src="content/js/navbar.js"></script>
</body>
</html>