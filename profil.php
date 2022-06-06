<?php
$email = $_GET['user'];
$obj = new Member();
$user = $obj->getUser($email);
$obj = new ReqUR();
$req = $obj->getAll();
?>

<div class="bg-primary min-h-screen pt-20 text-secondary2">
    <h1 class="text-center text-4xl font-bold uppercase mb-10">Profile</h1>
    <div class="w-fit mx-auto">
        <h2 class="text-2xl font-bold mb-5">Nama : <span class="text-white"><?= ucwords($user['nama']) ?></span></h2>
        <h2 class="text-2xl font-bold mb-5">Email : <span class="text-white"><?= $user['email'] ?></span></h2>
        <h2 class="text-2xl font-bold mb-5">Sebagai : <span class="text-white"><?= ucwords($user['role']) ?></span></h2>
        <?php
            if ($user['role'] == 'tamu') {
                $stat = '';
                foreach($req as $r){
                    if ($r['user_id'] == $user['id']) {
                        $stat = $r['status'];
                    }
                }
                if (empty($stat)) {
        ?>
        <form action="memberController.php" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="hidden" name="nama" value="<?= $user['nama'] ?>">
            <input type="hidden" name="email" value="<?= $user['email'] ?>">
            <h2 class="text-2xl font-bold mb-5">Ajukan Sebagai Admin : 
                <button type="submit" name="tombol" value="uprole" class="text-primary bg-secondary2 pb-1 px-3 rounded-lg font-bold">Ajukan</button>
            </h2>
        </form>
        <?php
            }else{
        ?>
                <h2 class="text-2xl font-bold mb-5">Status Pengajuan Anda : <span class="text-white"><?= ucwords($stat) ?></span></h2>
        <?php
            }
        }
        ?>
    </div>
</div>