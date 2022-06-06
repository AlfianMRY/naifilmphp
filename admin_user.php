<?php
$obj = new User();
$data = $obj->getAll();
// var_dump($data);
if (!empty($user) && $role == 'developer') { 
?>
<div class="bg-primary min-h-screen p-10 relative">
        <h3 class="text-2xl font-bold uppercase text-secondary2 py-5">List User</h3>
        <table class="text-white table-fixed w-full border-collapse border border-secondary">
            <thead>
                <tr class="bg-secondary">
                    <th width="5%" class="border border-secondary2 py-2">No</th>
                    <th class="border border-secondary2">Nama</th>
                    <th class="border border-secondary2">Email</th>
                    <th class="border border-secondary2">Role</th>
                    <th class="border border-secondary2">Action</th>
                </tr>
            </thead>
            <tbody class=" align-top">
                <?php
                    $no = 1;
                    $bg = 'bg-primary2';
                foreach ($data as $d){

                ?>
                    <tr class="<?= ($d['role'] == 'developer') ? 'bg-secondary2 text-primary font-bold border-secondary' : (($no%2 == 1) ? $bg : '') ?>">
                        <th class="border border-secondary p-4"><?= $no++ ?></th>
                        <td class="border border-secondary p-4"><?= ucwords($d['nama']) ?></td>
                        <td class="border border-secondary p-4"><?= $d['email'] ?></td>
                        <th class="border border-secondary uppercase p-4 <?= $d['role'] == 'admin' ? 'text-secondary2' : '' ?>"><?= $d['role'] ?></th>
                        <th class="border border-secondary p-4">
                            <?php
                                if ($d['nama'] == $user['nama']) {
                                    echo 'Ini Anda';
                                }elseif($d['role'] == 'developer' && $d['nama'] != $user['nama']){
                                    ?>
                                    <div class="flex justify-center">
                                        <form action="userController.php" method="post">
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <input type="hidden" name="aksi" value="admin">
                                            <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-secondary text-secondary2 font-bold rounded-l-lg">Jadi Admin</button>
                                        </form>
                                        <form action="userController.php" method="post">
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <input type="hidden" name="aksi" value="tamu">
                                            <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-primary text-secondary font-bold rounded-r-lg">Jadi Tamu</button>
                                        </form>
                                    </div>
                                    <?php
                                }elseif ($d['role'] == 'admin') {
                                ?>
                                <div class="flex justify-center">
                                    <form action="userController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                        <input type="hidden" name="aksi" value="tamu">
                                        <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-secondary2 text-secondary font-bold rounded-l-lg">Jadi Tamu</button>
                                    </form>
                                    <form action="userController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                        <input type="hidden" name="aksi" value="developer">
                                        <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-secondary text-secondary2 font-bold rounded-r-lg">Jadi Developer</button>
                                    </form>
                                </div>
                                <?php
                                }elseif ($d['role'] == 'tamu') {
                                ?>
                                    <div class="flex justify-center">
                                        <form action="userController.php" method="post">
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <input type="hidden" name="aksi" value="admin">
                                            <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-secondary2 text-secondary font-bold rounded-l-lg">Jadi Admin</button>
                                        </form>
                                        <form action="userController.php" method="post">
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <input type="hidden" name="aksi" value="developer">
                                            <button type="submit" name="tombol" value="upuser" class="py-1 px-2 text-sm bg-secondary text-secondary2 font-bold rounded-r-lg">Jadi Developer</button>
                                        </form>
                                    </div>
                                <?php
                                }
                            ?>
                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php }else{
    include_once 'noakses.php';
} ?>