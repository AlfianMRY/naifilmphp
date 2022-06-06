<?php
//membuat var session
if (isset($_SESSION['MEMBER'])) {
    $user = $_SESSION['MEMBER'];
}else {
    $user = '';
}
?>
<div id="navbar" class="bg-secondary py-3 z-10 top-0 right-0 left-0 " >
    <div class="container mx-auto justify-between justify-content-center flex px-3 md:px-0">
        <div class="inline-block align-middle ">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-secondary2"><a href="index.php">NAIFILM</a></h1>
        </div>
        <div class="inline-block align-middle ">
            <button onclick="navlink()" class="md:hidden"><i id="navicon" class="fa-solid fa-bars"></i></button>
            <ul class=" md:flex hidden pt-1">
                <li><a href="index.php" class="uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white ">Home</a>
                </li>
                <li class="group relative"><a class="cursor-default uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white">Category <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                    <ul id="cat_list" class="gap-3  hidden group-hover:block z-30 absolute bg-secondary/40 backdrop-blur-sm border-white rounded border-2 p-3">
                        <?php
                            foreach ($typefilm as $t) {
                        ?>
                            <li><a href="index.php?hal=film_kategori&kat=<?= $t['nama'] ?>" class="uppercase text-sm font-bold text-slate-300 hover:text-white"><?= $t['nama'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="group relative"><a class="cursor-default uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white">Genre <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                    <ul id="gen_list" class="absolute justify-between hidden group-hover:flex group-hover:flex-wrap z-40 min-w-[193px] gap-3 right-0 bg-secondary/40 backdrop-blur-sm border-white rounded border-2 p-3 ">
                        <?php
                            foreach ($genre as $g) {
                        ?>
                            <li><a href="index.php?hal=film_genre&genre=<?= $g['nama'] ?>" class="hover:cursor-pointer uppercase text-sm w-1/2 font-bold text-slate-300 hover:text-white"><?= $g['nama'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="align-middle md:inline-block hidden">
            <?php
                if(empty($user)){
            ?>
            <a href="index.php?hal=login" class="uppercase text-2xl rounded-full bg-secondary2 hover:bg-secondary2/80 text-secondary font-bold px-3">Login</a>
            <?php
                }else{
            ?>
            <ul class="pt-1">
                <li class="group relative"><a class="cursor-default uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white"><?= $user['nama'] ?> - <?= $user['role'] ?> <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                    <ul id="cat_list" class=" gap-3 hidden group-hover:block z-30 absolute bg-secondary/40 backdrop-blur-sm border-white rounded border-2 p-3">
                        <?php
                            if ($role != 'tamu') {
                                if ($role == 'developer') {
                        ?>
                        <li><a href="admin.php?hal=admin_user" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Kelola User</a></li>
                        <?php } ?>
                        <li><a href="admin.php?hal=admin_listfilm" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Kelola Film</a></li>
                        <?php } ?>
                        <li><a href="index.php?hal=profil&user=<?= $user['email'] ?>" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Profile</a></li>
                        <li><a href="logout.php" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
    <div id="navmenu" class="absolute z-[5] bg-secondary/30 backdrop-blur-sm md:hidden hidden pb-4 pr-10 top-16 right-0 left-0 text-right">
        <ul class="pt-1">
            <li class="my-5">
                <a href="index.php" class="uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white ">Home</a>
            </li>
            <li class="group relative my-5"><a class="cursor-default uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white">Category <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                <ul class="flex flex-wrap w-fit ml-auto justify-end w-fit my-5">
                <?php
                    foreach ($typefilm as $t) {
                    ?>
                    <li><a href="index.php?hal=film_kategori&kat=<?= $t['nama'] ?>" class="uppercase text-md font-bold text-slate-300 hover:text-white mx-3"><?= $t['nama'] ?></a></li>
                <?php } ?>
                </ul>
            </li>
            <li class="group my-5"><a class="cursor-default uppercase font-semibold text-xl mx-3 text-secondary2 hover:text-white">Genre <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                <ul class="flex flex-wrap my-5 w-fit ml-auto justify-between gap-4 pl-10">
                <?php
                    foreach ($genre as $g) {
                    ?>
                    <li><a href="index.php?hal=film_genre&genre=<?= $g['nama'] ?>" class="hover:cursor-pointer uppercase text-md font-bold text-slate-300 hover:text-white"><?= $g['nama'] ?></a></li>
                <?php } ?>
                </ul>
            </li>
        </ul>
        <?php
            if(empty($user)){
        ?>
        <a href="index.php?hal=login" class="uppercase text-2xl rounded-full bg-secondary2 hover:bg-secondary2/80 text-secondary font-bold px-3">Login</a>
        <?php
            }else{
        ?>
        <ul class="pt-1">
                <li class="group relative my-5"><a class="cursor-default uppercase font-semibold text-lg mx-3 text-secondary2 hover:text-white"><?= $user['nama'] ?> - <?= $user['role'] ?> <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></a>
                <ul class="flex flex-wrap my-5 w-fit ml-auto justify-end gap-4">
                    <?php
                        if ($role != 'tamu') {
                            if ($role == 'developer') {
                    ?>
                    <li><a href="admin.php?hal=admin_user" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Kelola User</a></li>
                    <?php } ?>
                    <li><a href="admin.php?hal=admin_listfilm" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Kelola Film</a></li>
                    <?php } ?>
                    <li><a href="index.php?hal=profil&user=<?= $user['email'] ?>" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Profile</a></li>
                    <li><a href="logout.php" class="uppercase text-sm font-bold text-slate-300 hover:text-white">Logout</a></li>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
</div>

