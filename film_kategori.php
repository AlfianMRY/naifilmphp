<?php
    $id = $_GET['kat'];
    $data = $objtf->detail($id);
?>
    <div class="h-screen bg-no-repeat bg-center" style="background-image: url('content/img/cinema.jpg')">
        <div class=" text-center text-5xl font-bold ">
            <h1 class="md:p-40 pt-64 text-secondary2 drop-shadow-lg block align-middle">NONTON FILM GRATIS
                <span class="block">TANPA KARCIS</span>
            </h1>
        </div>
    </div>
    <div class="bg-primary2 pb-10">
        <div class="flex justify-between container mx-auto py-2">
            <h1 class="text-3xl font-bold py-4 container mx-auto text-secondary2 text-center sm:text-left">Kategori <?= $data['nama'] ?></h1>
        </div>
        <div class="container mx-auto flex flex-wrap  justify-center">
            <?php
                foreach ($film as $f) {
                    if ($f['type_film_id'] == $data['id']) {
                ?>
                <div class="card flex justify-center">
                    <div class="card-cover group">
                        <div class="card-header" >
                            <img class="card-image group-hover:scale-125 w-full " src="content/img/image.png" alt="">
                        </div>
                        <div class="card-body h-48">
                            <h1 class="text-lg font-bold uppercase">
                                <a href="index.php?hal=film_detail&slug=<?= $f['slug'] ?>" class="hover:text-secondary2">
                                    <?php
                                        $judul = $f['judul'];
                                        if (strlen($judul) > 20){
                                            $judul =  substr($judul, 0, 19) . '...';
                                            echo $judul;
                                        }else{
                                            echo $judul;
                                        }
                                    ?>
                                     (<?= $f['tahun'] ?>)
                                </a>
                            </h1>
                            <h2 class="text-sm text-secondary2 mb-3 font-bold">
                                <?php
                                    $obj = new Rating();
                                    $rate = $obj->rate($f['id']);
                                    if ($rate[0]) {
                                        $nilai = number_format($rate[0],2);
                                        $full = '<i class="fa-solid fa-star"></i>';
                                        $kosong = '<i class="fa-regular fa-star"></i>';
                                        if ($rate[0] > 0 && $rate[0] <= 2) {
                                            echo $full.$kosong.$kosong.$kosong.$kosong.' '.$nilai;
                                        }elseif ($rate[0] > 2 && $rate[0] <= 4) {
                                            echo $full.$full.$kosong.$kosong.$kosong.' '.$nilai;
                                        }elseif ($rate[0] > 4 && $rate[0] <= 6) {
                                            echo $full.$full.$full.$kosong.$kosong.' '.$nilai;
                                        }elseif ($rate[0] > 6 && $rate[0] <= 8) {
                                            echo $full.$full.$full.$full.$kosong.' '.$nilai;
                                        }elseif ($rate[0] > 8 && $rate[0] <= 10) {
                                            echo $full.$full.$full.$full.$full.' '.$nilai;
                                        }else{
                                            echo $kosong.$kosong.$kosong.$kosong.$kosong.' '.$nilai;
                                        }
                                    }else{
                                        echo 'Belum ada rating';
                                    }
                                ?>
                            </h2>
                            <div class="mb-3 flex flex-wrap gap-2">
                                <?php
                                    foreach ($genrefilm as $gm){
                                        if ($gm['id'] == $f['id']){ 
                                            ?>
                                            <a href="index.php?hal=film_genre&genre=<?= $gm['nama'] ?>" class="font-bold text-sm hover:bg-yellow-500 bg-secondary2 rounded-full py-1 px-2"><?= $gm["nama"] ?></a>
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>