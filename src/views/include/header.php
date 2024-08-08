<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= URLROOT;?>/public/css/style.css">
<title> <?= SITENAME; ?> </title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="<?= URLROOT; ?>"> Home </a></li>
            <li><a href="<?= URLROOT; ?>/about"> About </a></li>
            <li><a href="<?= URLROOT; ?>/test/tasks">Test database</a></li>
        </ul>
    </nav> -->
<html lang="vi">
<!-- change name 'clone - website ' edit -->

<head>
    <meta charset="utf-8">
    <title>  <?php echo isset($title) ? $title : 'HOME' ?> </title>
    <meta name="description" content="<?=DEFAUL_URL_WEB ?>">
    <meta name="keywords" content="<?=DEFAUL_URL_WEB ?> web ban nick uy tin">
    <!-- Open Graph data -->
    <link rel="icon" type="image/png" href="<?= URLROOT; ?>/template/theme/assets/image/9EyDJaM.gif">
    <meta property="og:title" content="<?=DEFAUL_URL_WEB ?>">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=DEFAUL_URL_WEB ?>">
    <meta property="og:image" content="<?= URLROOT; ?>/template/theme/assets/image/9EyDJaM.gif">
    <meta property="og:description" content="<?=DEFAUL_URL_WEB ?>">
    <meta property="og:site_name" content="<?=DEFAUL_URL_WEB ?>">
    <meta property="article:section" content="<?=DEFAUL_URL_WEB ?>">
    <meta property="article:tag" content="<?=DEFAUL_URL_WEB ?> web ban nick uy tin">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="<?= URLROOT; ?>/template/theme/assets/image/9EyDJaM.gif">
    <meta name="twitter:title" content="<?=DEFAUL_URL_WEB ?>">
    <meta name="twitter:description" content="<?=DEFAUL_URL_WEB ?>">
    <meta name="twitter:image:src" content="<?= URLROOT; ?>/template/theme/assets/image/9EyDJaM.gif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link data-n-head="ssr" rel="preconnect" href="https://fonts.gstatic.com">
    <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Goldman&amp;display=swap">
    <link data-n-head="ssr" rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@900&amp;display=swap">
    <link href="<?= URLROOT; ?>/template/theme/assets/frontend/css/style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <script src="https://connect.facebook.net/vi_VN/sdk.js?hash=a4bd6411be26d06c55cbe76fc57a9e53" async=""
        crossorigin="anonymous"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/theme/assets/plugins/js-cookie/js.cookie.js"
        type="text/javascript"></script>
    <script
        src="<?= URLROOT; ?>/template/theme/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/boostrap-datepicker.min.js"
        type="text/javascript"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/js/kun.js"></script>
    <script src="<?= URLROOT; ?>/template/theme/assets/frontend/js/backtotop.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="<?= URLROOT; ?>/template/theme/assets/frontend/css/swal2.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.2/dist/lazyload.min.js"></script>
    <!-- Open Graph data -->

    <link href="https://fonts.googleapis.com/css2?family=Lobster&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cousine:ital@1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&amp;display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

    <link href="<?= URLROOT; ?>/template/theme/assets/frontend/css/dataTable.css" rel="stylesheet" type="text/css">
    <link href="<?= URLROOT; ?>/template/theme/assets/frontend/css/snows.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="thongbao"></div>
    <div style="height: auto;min-height: 100vh;">
        <div class="sticky top-0 z-100" style="background: #333;">
            <div class="shadow">
                <header class="mx-auto w-full max-w-6xl px-2 flex flex-wrap items-center py-2"
                    style="background: #333;color:white;">
                    <div class="flex-1 flex justify-between items-center">
                        <a href="https://<?=DEFAUL_URL_WEB ?>/"><img width="110" height="50"
                                src="<?= URLROOT; ?>/template/theme/assets/image/9EyDJaM.gif" class="v-logo"></a>
                    </div>
                    <?php if(isset($_SESSION["user"])): ?>
                    <a href="<?= URLROOT; ?>/auth/profile"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-gray-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor"><span
                            class="block"><i class="relative bx bxs-user mr-2 "></i><?= $_SESSION["user"]["username"] ?>
                            - <?= $_SESSION["user"]["money"] ?></span></a>
                    <a href="<?= URLROOT; ?>/auth/logout"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-gray-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor"><span
                            class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng xuất</span></a>
                    <?php else: ?>
                    <a href="<?= URLROOT; ?>/auth/loginPage"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-gray-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor"><span
                            class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng nhập</span></a>
                    <a href="<?= URLROOT; ?>/auth/registerPage"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-gray-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor"><span
                            class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng kí</span></a>
                    <?php endif; ?>

                    <label for="menu-toggle" id="toggle" class="pointer-cursor text-white-800 text-2xl lg:hidden block">
                        <span class="h-8 w-8 border border-gray-400 justify-center items-center inline-flex rounded"><i
                                class="bx bx-menu"></i></span>
                    </label>
                    <div class="hidden md:mt-0 lg:flex lg:items-center lg:w-auto w-full" id="menu-toggle">
                        <nav class="font-bold lg:text-lg">
                            <ul class="lg:flex items-center justify-between text-base text-white-700 lg:pt-0">
                                <li><a href="<?= URLROOT; ?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block  lr-btn">TRANG CHỦ</a>
                                </li>
                                <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["isAdmin"] == 1): ?>
                                <li>
                                    <a href="<?= URLADMINROOT ?>/dashboard" class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block  lr-btn">TRANG ADMIN
                                        ADMIN</a>
                                </li>
                                <?php endif; ?>
                                <li><a href="<?= URLROOT ?>/auth/rechargeBanking" class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block lr-btn">NẠP
                                        ATM</a></li>
                                <li><a href="<?= URLROOT ?>/auth/historyBuy" class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block lr-btn">LỊCH SỬ
                                        MUA
                                        ACC</a></li>
                                <?php if(isset($_SESSION["user"])): ?>
                                <a href="<?= URLROOT; ?>/auth/profile" class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center
                                text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor lr-btn"><span
                                        class="block"><i
                                            class="relative bx bxs-user mr-2 "></i><?= $_SESSION["user"]["username"] ?>
                                        - <?= $_SESSION["user"]["money"] ?></span></a>
                                <a href="<?= URLROOT; ?>/auth/logout"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor lr-btn"><span
                                        class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng xuất</span></a>
                                <?php else: ?>
                                <a href="<?= URLROOT; ?>/auth/loginPage" class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center
                                text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor lr-btn"><span
                                        class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng nhập</span></a>
                                <a href="<?= URLROOT; ?>/auth/registerPage"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor lr-btn"><span
                                        class="block"><i class="relative bx bxs-user mr-2 "></i>Đăng kí</span></a>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    </div>
                </header>
            </div>
        </div>