<?php if (!empty($user) && $role != 'tamu') { ?>
<div class="bg-primary min-h-screen p-10 relative">
        <h3 class="text-2xl font-bold uppercase text-secondary2 py-5">List Film</h3>
        <table class="text-white table-fixed w-full border-collapse border border-secondary">
            <thead>
                <tr class="bg-secondary">
                    <th width="5%" class="border border-secondary2 py-2">No</th>
                    <th class="border border-secondary2">Judul Film</th>
                    <th class="border border-secondary2">Pembuat</th>
                    <th class="border border-secondary2">Jenis</th>
                    <th class="border border-secondary2">Genre</th>
                    <th class="border border-secondary2">Deskripsi</th>
                    <th class="border border-secondary2">Action</th>
                </tr>
            </thead>
            <tbody class=" align-top">
                <?php
                    $no = 1;
                    $bg = 'bg-primary2';
                foreach ($film as $f){

                ?>
                    <tr class="<?= $no%2 == 1 ? $bg : '' ?>">
                        <th class="border border-secondary p-4"><?= $no++ ?></th>
                        <td class="border border-secondary p-4"><?= $f['judul'] ?></td>
                        <td class="border border-secondary p-4"><?= $f['pembuat'] ?></td>
                        <td class="border border-secondary p-4">
                            <?php
                                foreach ($typefilm as $tf) {
                                    if ($tf['id'] == $f['type_film_id']) {
                                        echo $tf['nama'];
                                    }
                                }
                            ?>
                        </td>
                        <td class="border border-secondary p-4">
                    <?php
                        foreach ($genrefilm as $gm) {
                            if ($gm['id'] == $f['id']) {
                                echo $gm['nama'].' ';
                            }
                        }
                    ?>
                        </td>
                        <td class="border border-secondary p-4"><?= $f['deskripsi'] ?></td>
                        <form action="filmController.php" method="post">
                            <th class="border border-secondary p-4 flex justify-center">
                                <a href="admin.php?hal=admin_editfilm&judul=<?= $f['slug'] ?>" class="bg-secondary2 rounded-l-lg hover:bg-yellow-500 px-3 py-2 text-secondary font-bold text-xl"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <button type="submit" name="tombol" value="hapus" onclick="return confirm("Yakin Hapus Film ini?)" class="delete-confirm bg-secondary rounded-r-lg hover:bg-primary2 px-3 py-2 text-secondary2 font-bold text-xl" value="Dell"><i class="fa-solid fa-trash-can"></i> Dell</button>
                                <input type="hidden" name="id" value="<?= $f['id'] ?>">
                            </th>
                        </form>
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