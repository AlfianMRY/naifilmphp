
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
                colors: {
                primary: "#630606",
                primary2: "#890F0D",
                secondary: "#E83A14",
                secondary2: "#D9CE3F",
            },
            }
        }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .card {
                @apply lg:w-3/12 sm:w-1/2 w-full rounded-lg p-3;
            }
            .card-cover {
                @apply w-full drop-shadow-2xl;
            }
            .card-header {
                @apply overflow-hidden rounded-t-lg;
            }
            .card-image {
                @apply ease-out duration-300 delay-100 h-[400px] w-full;
            }
            .card-body {
                @apply bg-gradient-to-b from-white/60 to-transparent p-3 rounded-b-lg;
            }
            .icon-dropdown {
                @apply transition ease-in-out duration-300;
            }
            .paglink {
                @apply px-2 bg-secondary2 text-secondary font-bold;
            }
            .active {
                @apply px-2 text-secondary2 bg-secondary font-bold;
            }
            #navicon {
                @apply text-3xl pr-3 text-secondary2;
            }
            .navbar-fixed {
                @apply fixed w-full z-[9999] bg-opacity-70 backdrop-blur-sm;
                box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
            }
            .nav-link {
                @apply md:text-xl text-base font-bold uppercase text-secondary2 my-4 ml-3 hover:text-secondary;
            }
            .drop-link {
                @apply pl-4 md:text-xl text-base font-bold uppercase text-secondary2 my-4 ml-3 hover:text-white;
            }
            .nav-link,
            .dd-link {
                @apply hover:bg-secondary2 py-2 px-4 rounded-l-full;
            }
            .dd-link {
                @apply md:text-base text-sm font-bold  text-secondary2 my-4 ml-5 hover:text-secondary;
            }
            .link-active {
                @apply bg-secondary2 py-2 px-4 rounded-l-full text-secondary;
            }

            label {
                @apply text-secondary2 text-xl font-bold;
            }
            select,
            input[type="text"],
            input[type="number"],
            input[type="email"],
            input[type="password"],
            textarea {
                @apply bg-transparent px-5 py-2 text-secondary2 border-2 border-secondary2 focus:border-2 focus:ring-secondary2 focus:border-secondary2 rounded-lg  focus:outline-none;
            }
            input[type="checkbox"] {
                @apply appearance-none h-4 w-4 border border-yellow-300 rounded-sm bg-secondary  checked:bg-secondary2 checked:border-secondary indeterminate:bg-primary focus:outline-none transition duration-200;
            }
            select > option {
                @apply bg-primary2 focus:border-secondary2 text-center hover:bg-secondary2 hover:text-white;
            }
            select > option:disabled {
                @apply bg-primary text-white;
            }
            input[type="file"] {
                @apply file:rounded-lg file:py-2 file:px-4 file:border-secondary2 file:bg-primary2 file:hover:bg-primary file:cursor-pointer file:text-secondary2  file:mr-4 text-secondary2;
            }

            .invalid-input {
                @apply text-secondary font-bold md:ml-60 w-4/6 mb-2;
            }
            /* .search {
                    @apply border-r-0 !important;
                } */
        }
    </style>
</head>
<body>
<div class="bg-primary min-h-screen h-full">
    <div class="text-center font-bold uppercase text-4xl pt-64 text-secondary2">Akses ditolak!</div>
    <div class="mx-auto w-fit pt-10">
        <a href="index.php" class="bg-secondary2 text-primary font-bold py-2 px-4 mt-5">Kembali</a>
    </div>
</div>
</body>
</html>