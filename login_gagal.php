<div class="bg-secondary">
    <div class="w-screen md:h-screen pb-24 container mx-auto">
        <h1 class="text-center py-10 text-4xl font-bold text-secondary2 uppercase">Gagal Login</h1>
        <h2 class="text-center pb-10 text-xl font-bold text-secondary2 uppercase">Email / Password Salah!</h2>
        <div class="md:w-[60%] mx-auto bg-primary border-4 border-secondary2 rounded-xl text-secondary2 p-10">
            <form action="memberController.php" method="post">
                <div class="w-full my-4 flex flex-wrap  items-center md:pr-5">
                    <label for="" class="w-2/6 md:text-xl text-base">Email : </label>
                    <input type="email" name="email" placeholder="user@gmail.com" value="" class="w-4/6  appearance-none " required>
                </div>
                <div class="w-full my-4 flex flex-wrap  items-center md:pr-5">
                    <label for="" class="w-2/6 md:text-xl text-base">Password : </label>
                    <input type="password" name="password" placeholder="password" value="" class="w-4/6 appearance-none " required>
                </div>
                <p class="text-secondary2 cursor-default">Belum Punya Akun? Klik <a href="index.php?hal=signin" class="text-white">Disini</a></p>
                <div class="mt-10">
                    <a href="index.php" class="py-2 px-4 rounded-xl bg-secondary2 text-secondary font-bold uppercase hover:bg-yellow-500 border-4 border-primary2 hover:border-secondary">Back</a>
                    <button type="submit" name="tombol" value="login" class="py-2 px-4 rounded-xl bg-secondary text-secondary2 font-bold uppercase hover:bg-primary2 border-4 border-primary2 hover:border-secondary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>