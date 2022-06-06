<?php if (!empty($user) && $role != 'tamu') { ?>
<div class="p-10 bg-primary">
    <h3 class="text-2xl font-bold uppercase text-secondary2 py-5">Add Film</h3>
    <form class="pt-5" action="filmController.php" method="POST" enctype="multipart/form-data">
        <div class="flex flex-wrap ">
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Judul :</label>
                <input type="text" name="judul" class="w-4/6 " value="" required>
            </div>
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Tahun :</label>
                <input type="number" name="tahun" placeholder="2000" value="" class="w-4/6  appearance-none " required>
            </div>
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Pembuat :</label>
                <input type="text" name="pembuat" class="w-4/6 " value="" required>
            </div>
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Type :</label>
                <select name="type" id="" class="w-4/6 "required>
                    <option selected disabled> ~~ Select Type Film ~~ </option>
                    <?php
                        foreach ($typefilm as $tf) {
                    ?>
                            <option value="<?= $tf['id'] ?>"><?= $tf['nama'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Image :</label>
                <input type="file" name="poster" class="w-4/6 " value="">
            </div>
            <div class="md:w-1/2 w-full my-4 flex flex-wrap  items-center md:pr-5">
                <label for="" class="w-2/6 md:pl-10">Link :</label>
                <input type="text" name="link" class="w-4/6  " value="" >
            </div>
        </div>
        <div class="flex flex-wrap items-start">
            <div class="md:w-1/2 w-full my-4 flex flex-wrap md:pr-5">
                <label for="" class="w-2/6 md:pl-10 pt-3">Deskripsi :</label>
                <textarea class="w-4/6" name="deskripsi" rows="10" required></textarea>
            </div>
            <div class="md:w-1/2 my-4 flex flex-wrap items-center ">
                <label for="" class="md:w-2/6 md:pl-10">Genre :</label>
                <div class="md:w-4/6 flex flex-wrap justify-evenly">
                    <?php
                        foreach ($genre as $g) {
                    ?>
                        <div class="w-1/2 py-1 ">
                            <input type="checkbox" class="cursor-pointer" name="genre[]" value="<?= $g['id'] ?>" id="">
                            <label for=""><?= $g['nama'] ?></label>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="md:pl-10 items-center mt-5">
                    <label for="" class="mr-10">Keterangan : </label>

                    <input type="checkbox" name="" id="" Checked>
                    <label for="" class="mr-5">Selected</label>
                    <input type="checkbox" name="" id="" >
                    <label for="">Non Selected</label>
                </div>
            </div>
        </div>
        <div class="md:pl-10">
            <a href="admin.php?hal=admin_listfilm" class="py-2 px-4 rounded-xl bg-secondary2 text-secondary font-bold uppercase hover:bg-yellow-500 border-4 border-primary2 hover:border-secondary">Back</a>
            <button type="submit" name="tombol" value="simpan" class="py-2 px-4 rounded-xl bg-secondary text-secondary2 font-bold uppercase hover:bg-primary2 border-4 border-primary2 hover:border-secondary">Add Film</button>
        </div>
    </form>
</div>
<?php }else{
    include_once 'noakses.php';
} ?>