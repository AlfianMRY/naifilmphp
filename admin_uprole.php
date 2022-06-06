<?php
$obj = new ReqUR();
$data = $obj->getWait();
// var_dump($data);
if (!empty($user) && $role == 'developer') { 
?>
<div class="bg-primary min-h-screen p-10 relative">
        <h3 class="text-2xl font-bold uppercase text-secondary2 py-5">List Request Menunggu Action</h3>
        <table class="text-white table-fixed w-full border-collapse border border-secondary">
            <thead>
                <tr class="bg-secondary">
                    <th width="5%" class="border border-secondary2 py-2">No</th>
                    <th class="border border-secondary2">Nama</th>
                    <th class="border border-secondary2">Email</th>
                    <th class="border border-secondary2">Status</th>
                    <th class="border border-secondary2">Action</th>
                </tr>
            </thead>
            <tbody class=" align-top">
                <?php
                    $no = 1;
                    $bg = 'bg-primary2';
                foreach ($data as $d){

                ?>
                    <tr class="<?= $no%2 == 1 ? $bg : '' ?>">
                        <th class="border border-secondary p-4"><?= $no++ ?></th>
                        <td class="border border-secondary p-4"><?= ucwords($d['nama']) ?></td>
                        <td class="border border-secondary p-4"><?= $d['email'] ?></td>
                        <td class="border border-secondary p-4"><?= ucwords($d['status']) ?></td>
                        <td class="border border-secondary p-4">
                            <div class="flex justify-around">
                                <form action="roleController.php" method="post">
                                    <input type="hidden" name="id" value="<?= $d['user_id'] ?>">
                                    <button type="submit" name="tombol" value="tolak" class="text-primary font-bold bg-secondary2 py-1 px-3">Tolak</button>
                                </form>
                                <form action="roleController.php" method="post">
                                    <input type="hidden" name="id" value="<?= $d['user_id'] ?>">
                                    <button type="submit" name="tombol" value="terima" class="text-primary font-bold bg-secondary2 py-1 px-3">Terima</button>
                                </form>
                            </div>
                        </td>
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