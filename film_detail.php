<?php 

$slug = $_GET['slug'];
$data = $objf->detail($slug);

$obj = new Rating();
$rate = $obj->rate($data['id']);
$rating = $obj->getAll();
$total = $obj->countrate($data['id']);
// echo($total);

?>
<div class="bg-primary2">
    <div class="container  mx-auto min-h-screen py-10">
        <div class="flex flex-wrap">
            <div class="md:w-1/3 bg-cover bg-center md:min-h-[660px] h-[440px] w-full" style="background-image: url('content/img/image.png')">
                <!-- <img src="content/img/image.png" alt="" class="sm:hidden"> -->
            </div> 
            <div class="md:w-2/3 pt-10 md:pl-10 pl-5">
                <h1 class="md:text-4xl text-2xl font-bold text-secondary2 uppercase"><?= $data['judul'] ?> (<?= $data['tahun'] ?>)</h1>

                <div class="py-5">
                    <h3 class="md:text-2xl text-xl font-bold text-white">Genre :</h3>
                    <div class="flex flex-wrap">
                        <?php
                            foreach ($genrefilm as $gm) {
                                if ($gm['id'] == $data['id']) {
                        ?>
                                    <a href="index.php?hal=film_genre&genre=<?= $gm['nama'] ?>" class="text-primary font-bold px-2 mr-3 my-2 bg-secondary2 rounded-full"><?= $gm['nama'] ?></a>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>

                <h3 class="text-xl md:text-2xl font-bold text-white">Creator : <span class="text-secondary2"><?= $data['pembuat'] ?></span></h3>
                <h3 class="text-base md:text-2xl font-bold text-white mt-5">Rating : 
                    <span class="text-secondary2">
                        <?php
                            if ($rate[0]) {
                                $nilai = number_format($rate[0],2);
                                $full = '<i class="fa-solid fa-star"></i>';
                                $kosong = '<i class="fa-regular fa-star"></i>';
                                if ($rate[0] > 0 && $rate[0] <= 2) {
                                    echo $full.$kosong.$kosong.$kosong.$kosong.' '.$nilai.' ( '.$total[0].' Orang )';
                                }elseif ($rate[0] > 2 && $rate[0] <= 4) {
                                    echo $full.$full.$kosong.$kosong.$kosong.' '.$nilai.' ( '.$total[0].' Orang )';
                                }elseif ($rate[0] > 4 && $rate[0] <= 6) {
                                    echo $full.$full.$full.$kosong.$kosong.' '.$nilai.' ( '.$total[0].' Orang )';
                                }elseif ($rate[0] > 6 && $rate[0] <= 8) {
                                    echo $full.$full.$full.$full.$kosong.' '.$nilai.' ( '.$total[0].' Orang )';
                                }elseif ($rate[0] > 8 && $rate[0] <= 10) {
                                    echo $full.$full.$full.$full.$full.' '.$nilai.' ( '.$total[0].' Orang )';
                                }else{
                                    echo $kosong.$kosong.$kosong.$kosong.$kosong.' '.$nilai.' ( '.$total[0].' Orang )';
                                }
                            }else{
                                echo 'Belum ada rating';
                            }
                        ?>
                    </span>
                </h3>
                <?php
                    if (!empty($user)) {
                        $user1 = '';
                        foreach ($rating as $r) {
                            if ($r['film_id'] == $data['id'] && $r['user_id'] == $user['id']) {
                                $user1 = 'Sudah Rating';
                            }
                        }
                        if (empty($user1)) {
                ?>
                    <form action="ratingController.php" method="post">
                        <div class="flex mt-5">
                            <div class="w-fit">
                            <p class="text-white md:text-xl text-base around-bold">Beri Rating : </p>
                            </div>
                            <div class="range-wrap mt-2 w-2/4">
                                <input type="range" name="rate" class="range" max="10" value="0">
                                <output class="bubble"></output>
                            </div>
                            <div>
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <input type="hidden" name="film_id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="slug" value="<?= $slug ?>">
                                <button class="bg-secondary2 rounded-lg py-1 px-3 mr-5 md:mr-10 font-bold">Kirim</button>
                            </div>
                        </div>
                    </form>
                <?php
                    }else{
                ?>
                    <p class="text-secondary2 text-xl font-bold mt-5">Anda Sudah Memberi Rating Pada Film Ini</p>
                <?php
                    }
                }
                ?>
                <p class="mt-5 mb-10 text-white text-xl">Deskripsi : <span class="text-secondary2"><?= $data['deskripsi'] ?></span></p>
                <div class="md:hidden">
                    <iframe src="<?= $data['link'] ?>" width="250" height="147" allowfullscreen></iframe>
                </div>
                <div class="hidden md:block lg:hidden">
                    <iframe src="<?= $data['link'] ?>" width="350" height="206" allowfullscreen></iframe>
                </div>
                <div class="hidden lg:block">
                    <iframe src="<?= $data['link'] ?>" width="560" height="315" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
  const range = wrap.querySelector(".range");
  const bubble = wrap.querySelector(".bubble");

  range.addEventListener("input", () => {
    setBubble(range, bubble);
  });
  setBubble(range, bubble);
});

function setBubble(range, bubble) {
  const val = range.value;
  const min = range.min ? range.min : 0;
  const max = range.max ? range.max : 100;
  const newVal = Number(((val - min) * 100) / (max - min));
  bubble.innerHTML = val;

  // Sorta magic numbers based on size of the native UI thumb
  bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}
</script>