<?php
    $hal = isset($_GET['hal']) ? $_GET['hal'] : "dashboard";

    if ($hal == 'admin_listfilm' || $hal == 'admin_addfilm' || $hal == 'admin_editfilm') {
        $ad = 'active';
    }elseif($hal == 'admin_user' || $hal == 'admin_uprole' || $hal == 'admin_uprolelist'){
        $ac = 'active';
    }else{
        $ad = '';
        $ac = '';
    }
    
    if (isset($_SESSION['MEMBER'])) {
        $user = $_SESSION['MEMBER'];
        $role = $user['role'];
    }else{
        $user = '';
        $role = '';
    }
    if ($user != "" && $role != 'tamu') { 
?>
<div class="bg-gradient-to-br from-secondary to-primary2 min-h-screen h-full py-5">
    <h1 class="lg:text-4xl md:text-2xl text-xl text-center font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-secondary2"><a href="index.php">NAIFILM</a></h1>
    <a href="index.php">
        <div class=" text-center mt-10 py-2 px-3 bg-secondary2">
            <h1 class=" text-xl font-bold text-secondary">View Landingpage</h1>
        </div>
    </a>
    <form action="logout.php" method="post">
        <button type="submit" class="w-full">
            <div class=" text-center mt-4 py-2 px-3 bg-secondary2">
                <h1 class=" text-xl font-bold text-secondary">Log Out ~ <?= $user['nama'] ?></h1>
            </div>
        </button>
    </form>
    <ul class="text-white mt-16 ml-2">
        <a href="admin.php" >
            
            <li class="nav-link <?= $hal == 'dashboard' ? 'active' : '' ?>">
                <i class="fa-solid fa-table-columns"></i> Dashboard
            </li>
        </a>
        <li class="drop-link group">
            <button onclick="cclink()" class="font-bold uppercase w-full text-left"><i class="fa-solid fa-film"></i> Film <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></button>
            
            <ul id="cclink" class="<?= $ad == 'active' ? '' : 'hidden' ?>">
                <a href="admin.php?hal=admin_listfilm" >
                    <li class="dd-link <?= $hal == 'admin_listfilm' ? 'link-active' : '' ?>">
                        <i class="fa-solid fa-list"></i> List Film
                    </li>
                </a>
                <a href="admin.php?hal=admin_addfilm" >
                    <li class="dd-link <?= $hal == 'admin_addfilm' ? 'link-active' : '' ?>">
                        <i class="fa-solid fa-plus"></i> Add Film
                    </li>
                </a>
                <li class="dd-link <?= $hal == 'admin_editfilm' ? 'link-active' : '' ?>">
                    <p class="cursor-default"><i class="fa-solid fa-pen-to-square"></i> Edit Film</p>
                </li>
            </ul>
        </li>
        <?php
            if ($role == 'developer') {
            
        ?>
        <li class="drop-link group">
            <button onclick="ddlink()" class="font-bold uppercase w-full text-left"><i class="fa-solid fa-user"></i> User <i class="icon-dropdown fa-solid fa-angles-right group-hover:rotate-90"></i></button>
            
            <ul id="ddlink" class="<?= $ac == 'active' ? '' : 'hidden' ?>">
                <a href="admin.php?hal=admin_user" >
                    <li class="dd-link <?= $hal == 'admin_user' ? 'link-active' : '' ?>">
                        <i class="fa-solid fa-users"></i> List User
                    </li>
                </a>
                <a href="admin.php?hal=admin_uprolelist" >
                    <li class="dd-link <?= $hal == 'admin_uprolelist' ? 'link-active' : '' ?>">
                        <i class="fa-solid fa-list"></i> List Req Role
                    </li>
                </a>
                <a href="admin.php?hal=admin_uprole" >
                    <li class="dd-link <?= $hal == 'admin_uprole' ? 'link-active' : '' ?>">
                    <i class="fa-solid fa-question"></i> Request Role
                    </li>
                </a>
            </ul>
        </li>
        <?php } ?>
    </ul>
</div>
<?php }else{
    include_once 'noakses.php';
} ?>