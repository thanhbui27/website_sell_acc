<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="v-theme">
    <div class="my-6">
        <div class="w-full max-w-6xl mx-auto relative ">
            <div class="flex md:flex-row-reverse flex-wrap">
                <div class="w-full md:w-4/6 pb-0">
                    <div class="ml-0 border-trueGray" style="
                                                                padding: 5px;
                                                                background: #333;
                                                                border-top-right-radius: 5px;
                                                                border-bottom-right-radius: 5px;
                                                                box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;
                                                                ">
                        <img src="./template/theme/assets/image/BB8WhAw.jpeg">
                    </div>
                </div>


                <div class="w-full md:w-2/6">
                    <div class="bg-trueGray-800 w-full"
                        style="min-height: 100%;padding: 5px;background: #333;border-top-left-radius: 5px;border-bottom-left-radius: 5px;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                        <div class="flex color-grant font-bold">
                            <div class="cursor-pointer bg-trueGray-800 tablinks active" onclick="Tab('nap')"
                                style="background: #333;">
                                <h2 class="font-extrabold md:text-2xl px-2 py-1 text-center text-xl vuarobux-text w-32"
                                    style="color: #99FFFF;">
                                    NẠP THẺ
                                </h2>
                            </div>
                            <div class="cursor-pointer w-full bg-trueGray-900 tablinks" onclick="Tab('top')"
                                style="background: #333; box-shadow: -2px 0px 0px 0px #ffd70057;">
                                <h2 class="font-extrabold md:text-2xl px-3 py-1 re text-center text-xl vuarobux-text"
                                    style="color: #99FFFF;">
                                    TOP NẠP TIỀN </h2>
                            </div>
                        </div>
                        <span class="tabcontent" id="nap" style="display:block;">
                            <form class="w-full form-header">
                                <div class="py-3 px-5">
                                    <span class="mb-2 block">
                                        <div class="flex items-center relative">
                                            <select id="loaithe"
                                                class="border-2 rounded block w-full bg-trueGray-900 focus:border-yellow-500 focus:bg-trueGray-900 text-white vuarobux-box w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600"
                                                style="     border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                                <option value="">✨ Loại Thẻ ✨</option>
                                                <option value="VIETTEL"> 🎫 Viettel 🎫</option>
                                                <option value="VINAPHONE"> 🎫 Vinaphone 🎫</option>
                                                <option value="MOBIFONE"> 🎫 Mobifone 🎫</option>
                                                <option value="ZING"> 🎫 Zing 🎫</option>
                                                <option value="VNMB"> 🎫 Vietnamobile 🎫</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-trueGray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    class="fill-current h-4 w-4">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="mb-2 block">
                                        <div class="flex items-center relative">
                                            <select id="menhgia"
                                                class="border-2 rounded block w-full bg-trueGray-900 focus:border-yellow-500 focus:bg-trueGray-900 text-white vuarobux-box w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600"
                                                style="     border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 10px #99FFFF;">
                                                <option value="">💸 Chọn mệnh giá 💸</option>
                                                <option value="10000">&gt; 10.000 VNĐ 💵</option>
                                                <option value="20000">&gt; 20.000 VNĐ 💵</option>
                                                <option value="30000">&gt; 30.000 VNĐ 💵</option>
                                                <option value="50000">&gt; 50.000 VNĐ 💵</option>
                                                <option value="100000">&gt; 100.000 VNĐ 💵</option>
                                                <option value="200000">&gt; 200.000 VNĐ 💵</option>
                                                <option value="500000">&gt; 500.000 VNĐ 💵</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-trueGray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    class="fill-current h-4 w-4">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="mb-2 block">
                                        <div class="flex items-center relative">
                                            <input type="text" id="pin" placeholder="Mã số thẻ"
                                                class="focus:outline-none appearance-none bg-trueGray-900 block leading-tight px-3 py-2 rounded text-white vuarobux-box w-full "
                                                style="     border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;  ">
                                        </div>
                                    </span>
                                    <span class="mb-2 block">
                                        <div class="flex items-center relative">
                                            <input type="text" id="seri" placeholder="Số serial"
                                                class="focus:outline-none appearance-none bg-trueGray-900 block leading-tight px-3 py-2 rounded text-white vuarobux-box w-full "
                                                style="     border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF; ">
                                        </div>
                                    </span>
                                    <div class="mt-4">
                                        <button type="button" id="NapThe"
                                            class="ff-lalezar flex focus:outline-none h-10 homepayin items-center justify-center pt-1 px-4 rounded text-2xl text-center uppercase vuarobux-box vuarobux-title w-full"
                                            style="/* color: rgb(153,255,255); */padding: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 20px #99FFFF;">
                                            Nạp Ngay
                                        </button>
                                    </div>
                                    <div class="text-center mt-2 text-white font-semibold text-sm">
                                        Hãy chọn đúng mệnh giá. Sai sẽ mất thẻ
                                    </div>
                                </div>
                            </form>

                        </span>
                        <div class="tabcontent" id="top">
                            <div class="v-list-top-card py-1 mt-2 md:py-2 px-1 md:px-3">

                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center vuarobux-box-top"
                                        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                        <div class="v-star relative">

                                            <span class="absolute font-bold text-white" style="top: 4px; left: 11px;;">
                                            </span>
                                        </div>
                                        <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                            style="max-width: 8rem;">
                                            <div class="text-xs" style="    display: inline-block;">
                                                💫1.
                                            </div>
                                            <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                                style="max-width: 8rem;">
                                                tnhan06 </span>
                                        </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span
                                            class="vuarobux-box vuarobux-title w-32 text-white rounded-sm text-center inline-block"
                                            style="margin: 5px;padding-bottom: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                            1.120.000 <span class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center vuarobux-box-top"
                                        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                        <div class="v-star relative">

                                            <span class="absolute font-bold text-white" style="top: 4px; left: 11px;;">
                                            </span>
                                        </div>
                                        <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                            style="max-width: 8rem;">
                                            <div class="text-xs" style="    display: inline-block;">
                                                💫2.
                                            </div>
                                            <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                                style="max-width: 8rem;">
                                                gialam </span>
                                        </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span
                                            class="vuarobux-box vuarobux-title w-32 text-white rounded-sm text-center inline-block"
                                            style="margin: 5px;padding-bottom: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                            690.000 <span class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center vuarobux-box-top"
                                        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                        <div class="v-star relative">

                                            <span class="absolute font-bold text-white" style="top: 4px; left: 11px;;">
                                            </span>
                                        </div>
                                        <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                            style="max-width: 8rem;">
                                            <div class="text-xs" style="    display: inline-block;">
                                                💫3.
                                            </div>
                                            <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                                style="max-width: 8rem;">
                                                Ankhai </span>
                                        </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span
                                            class="vuarobux-box vuarobux-title w-32 text-white rounded-sm text-center inline-block"
                                            style="margin: 5px;padding-bottom: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                            659.000 <span class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center vuarobux-box-top"
                                        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                        <div class="v-star relative">

                                            <span class="absolute font-bold text-white" style="top: 4px; left: 11px;;">
                                            </span>
                                        </div>
                                        <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                            style="max-width: 8rem;">
                                            <div class="text-xs" style="    display: inline-block;">
                                                💫4.
                                            </div>
                                            <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                                style="max-width: 8rem;">
                                                Hungahri </span>
                                        </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span
                                            class="vuarobux-box vuarobux-title w-32 text-white rounded-sm text-center inline-block"
                                            style="margin: 5px;padding-bottom: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                            600.000 <span class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center vuarobux-box-top"
                                        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                        <div class="v-star relative">

                                            <span class="absolute font-bold text-white" style="top: 4px; left: 11px;;">
                                            </span>
                                        </div>
                                        <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                            style="max-width: 8rem;">
                                            <div class="text-xs" style="    display: inline-block;">
                                                💫5.
                                            </div>
                                            <span class="ml-1 text-white w-full font-bold vuarobux-title"
                                                style="max-width: 8rem;">
                                                11111 </span>
                                        </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span
                                            class="vuarobux-box vuarobux-title w-32 text-white rounded-sm text-center inline-block"
                                            style="margin: 5px;padding-bottom: 5px;border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                            480.000 <span class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach($data["category"] as $cate): ?>
    <center>
        <div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold vuarobux-title-two "
            style="max-width: 450px;background: #333;border-radius: 5px;box-shadow: 0 0 15px #99FFFF, inset 0 0 20px #99FFFF;">
            ✨ <?=  $cate["title"]; ?>✨
        </div>
    </center>
    <div class="pb-10">
        <div class="v-card w-full max-w-6xl mx-auto">
            <div class="md:mx-0">
                <div class="py-2">
                    <div class="mb-16">
                        <div class="mb-4 py-4 md:p-4 vuarobux-box"
                            style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 10px #99FFFF;">
                            <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                                <?php if(count($cate["games"]) > 0) : ?>
                                <?php foreach($cate["games"] as $game): ?>
                                <div class="col-span-4 lg:col-span-2 md:col-span-2 relative rounded sm:col-span-4 vua vuarobux-box vuarobux-title-two xl:col-span-2"
                                    style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                    <a href="<?= URLROOT; ?>/server-game/<?= $game -> id ?>">
                                        <img data-src="<?=URLROOT  ?>/<?=$game -> image  ?>"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad">
                                    </a>
                                    <div class="py-1"><a href="<?= URLROOT; ?>/server-game/<?= $game -> id ?>">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                <?=$game -> name  ?> </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </a>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a href="<?= URLROOT; ?>/server-game/<?= $game -> id ?>">

                                            </a>
                                            <div class="button" id="button-6"
                                                style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                                <a href="<?= URLROOT; ?>/server-game/<?= $game -> id ?>">
                                                    <div id="spin"></div>
                                                </a><a href="<?= URLROOT; ?>/server-game/<?= $game -> id ?>">Mua Ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php endforeach;?>

    <!-- <center>
        <div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold vuarobux-title-two "
            style="max-width: 450px;background: #333;border-radius: 5px;box-shadow: 0 0 15px #99FFFF, inset 0 0 20px #99FFFF;">
            ✨ DANH MỤC DỊCH VỤ ✨
        </div>
    </center>

    <div class="pb-10">
        <div class="v-card w-full max-w-6xl mx-auto">
            <div class="md:mx-0">
                <div class="py-2">
                    <div class="mb-16">
                        <div class="mb-4 py-4 md:p-4 vuarobux-box"
                            style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 10px #99FFFF;">
                            <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">

                                <div class="col-span-4 lg:col-span-2 md:col-span-2 relative rounded sm:col-span-4 vua vuarobux-box vuarobux-title-two xl:col-span-2"
                                    style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                    <a href="#9">
                                        <img data-src="./template/theme/assets/image/category_DQUXOPM8A1YI.png"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad">
                                    </a>
                                    <div class="py-1"><a href="#9">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                Làm Nhiệm Vụ </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </a>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a href="#9">

                                            </a>
                                            <div class="button" id="button-6"
                                                style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                                <a href="#9">
                                                    <div id="spin"></div>
                                                </a><a href="#9">Mua Ngay </a>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-span-4 lg:col-span-2 md:col-span-2 relative rounded sm:col-span-4 vua vuarobux-box vuarobux-title-two xl:col-span-2"
                                    style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                    <a href="#10">
                                        <img data-src="./template/theme/assets/image/category_IK8QR5FXCWVL.png"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad">
                                    </a>
                                    <div class="py-1"><a href="#10">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                Up SM Đệ Tử </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </a>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a href="#10">

                                            </a>
                                            <div class="button" id="button-6"
                                                style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                                <a href="#10">
                                                    <div id="spin"></div>
                                                </a><a href="#10">Mua Ngay </a>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-span-4 lg:col-span-2 md:col-span-2 relative rounded sm:col-span-4 vua vuarobux-box vuarobux-title-two xl:col-span-2"
                                    style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                    <a href="#11">
                                        <img data-src="./template/theme/assets/image/category_AJU5LW0MO3S9.png"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad">
                                    </a>
                                    <div class="py-1"><a href="#11">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                Up SM Sư Phụ </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </a>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a href="#11">

                                            </a>
                                            <div class="button" id="button-6"
                                                style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 5px #99FFFF;">
                                                <a href="#11">
                                                    <div id="spin"></div>
                                                </a><a href="#11">Mua Ngay </a>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <center>
            <div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold vuarobux-title-two "
                style="max-width: 450px;background: #333;border-radius: 5px;box-shadow: 0 0 15px #99FFFF, inset 0 0 20px #99FFFF;">
                💰 DANH MỤC TRÒ CHƠI 💰
            </div>
        </center>
        <div class="pb-10">
            <div class="v-card w-full max-w-6xl mx-auto">
                <div class="md:mx-0">
                    <div class="py-2">
                        <div class="mb-16">
                            <div class="mb-4 py-4 md:p-4 vuarobux-box"
                                style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 10px #99FFFF;">



                                <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div> -->
</div>

<div class="animated modal fadeIn is-visible fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0"
    style="z-index: 999;display : none" id="indexModal">
    <div class="animated fadeInDown fixed shadow-inner max-w-md md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col vuarobux-box"
        style="border: solid 1px #99FFFF;box-shadow: 0 0 15px #99FFFF, inset 0 0 20px #99FFFF;">
        <div class="modal-header">
            <div class="text-red-600 font-bold text-lg text-center mb-3 p-3 uppercase vuarobux-text">
                <i style="background: url(https://i.imgur.com/1ZHeaAQ.gif);
            color: #56ffff;" class="bx bxs-analyse spin"></i>
                <a style="color: #99FFFF;">THÔNG BÁO</a> <i style="background: url(https://i.imgur.com/1ZHeaAQ.gif);
            color: #56ffff;" class="bx bxs-analyse spin"></i>
                <br>
            </div>
            <span class="absolute cursor-pointer text-2xl text-gray-800 pt-3 px-3" onclick="FuncHideModal()"
                style="right: -1px; top: -2px;"><i class="fa fa-times spin"
                    style="color: white;text-shadow: 0 0 4px #99FFFF;"></i></span>
        </div>

        <div class="modal-content">
            <div class="overflow-auto p-2 md:px-4" style="max-height: 600px;">
                <div class="relative px-2 pb-4 text-gray-900">
                    <div class="md:px-4 overflow-auto p-2" style="max-height:400px">
                        <p></p>
                        <blockquote class="blockquote" roboto="" condensed",="" sans-serif;="" font-size:="" 16px;=""
                            word-spacing:="" 1px;="" background-color:="" rgb(46,="" 53,="" 75);="" text-align:=""
                            center;"=""
                            style="border-width: 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-color: rgb(226, 232, 240); border-image: initial; --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty,); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(14,165,233,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px; z-index: 2; scroll-behavior: smooth; padding: 0px; outline: none;"
                            rgb(45,="" 54,="" 58);"="">
                            <div
                                style="border: 0px solid rgb(226, 232, 240); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty,); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(14,165,233,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px; z-index: 2; scroll-behavior: smooth; padding: 0px; outline: none; text-align: center;">
                                <blockquote class="blockquote" roboto="" condensed",="" sans-serif;="" font-size:=""
                                    16px;="" word-spacing:="" 1px;="" background-color:="" rgb(46,="" 53,="" 75);=""
                                    text-align:="" center;"=""
                                    style="border-width: 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-color: rgb(226, 232, 240); border-image: initial; --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty,); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(14,165,233,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px; z-index: 2; scroll-behavior: smooth; padding: 0px; outline: none;"
                                    start;="" rgb(45,="" 54,="" 58);"="">
                                    <div
                                        style="border: 0px solid rgb(226, 232, 240); --tw-shadow:0 0 transparent; --tw-ring-inset:var(--tw-empty,); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(14,165,233,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; margin: 0px; z-index: 2; scroll-behavior: smooth; padding: 0px; outline: none; text-align: center;">
                                        <div roboto="" condensed",="" sans-serif;="" font-size:="" 16px;=""
                                            word-spacing:="" 1px;="" background-color:="" rgb(45,="" 54,="" 58);"=""
                                            style="border: 0px solid rgb(226, 232, 240); --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty, ); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(14,165,233,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; z-index: 1; scroll-behavior: smooth; padding: 0px; outline: none;">
                                            <div roboto="" condensed",="" sans-serif;="" font-size:="" 16px;=""
                                                word-spacing:="" 1px;="" background-color:="" rgb(45,="" 54,="" 58);"=""
                                                style="border: 0px solid rgb(226, 232, 240); --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty, ); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(14,165,233,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; z-index: 1; scroll-behavior: smooth; padding: 0px; outline: none;">
                                                <div roboto="" condensed",="" sans-serif;="" font-size:="" 16px;=""
                                                    word-spacing:="" 1px;="" background-color:="" rgb(45,="" 54,=""
                                                    58);"=""
                                                    style="border: 0px solid rgb(226, 232, 240); --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty, ); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(14,165,233,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; z-index: 1; scroll-behavior: smooth; padding: 0px; outline: none;">
                                                    <h1
                                                        style="border: 0px solid rgb(226, 232, 240); --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty, ); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(14,165,233,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; z-index: 1; scroll-behavior: smooth; padding: 0px; outline: none;">
                                                        <b style="">
                                                            <font color="#ff9c00">NICK789.COM BÁN NICK UY TÍN GIÁ RẺ
                                                            </font>
                                                        </b>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </blockquote>
                        <h6 style=""><b>
                                <font color="#ffff00">Nạp </font>
                                <font color="#ff0000">ATM</font>
                                <font color="#ffff00"> 100k = 100k , 100k </font>
                                <font color="#ff0000">Thẻ</font>
                                <font color="#ffff00">&nbsp;= 80k shop<br></font>
                            </b><span style="font-family: Arial; font-size: 1rem; font-weight: bold;" arial=""
                                black";"="">
                                <font color="#ff0000">Nạp tiền lỗi , thanh lý nick-vàng , mua vàng ib zalo&nbsp;</font>
                            </span>
                            <font color="#ff0000"><b>0377928648&nbsp;<font
                                        style="font-family: inherit; font-size: 1rem;">hoặc fb</font></b></font><b
                                style="color: inherit; font-size: 1rem; font-family: Arial;">&nbsp;</b>
                            <font face="Arial" color="#00ffff" style="font-size: 1rem;"><b><a href=""
                                        target#="_blank">&gt; tại đây &lt;</a></b></font>
                        </h6>
                        <h6 style=""><img
                                src="data:image/gif;base64,R0lGODlhFgAKALMAAP//AP/Fxf+1tf+Zmf+EhP9mZv9SUv9CQv8zM/8hIf8QEP8AAP///wAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJCgAMACwAAAAAFgAKAAAEWdAkI4REJ+cyij5FoAAKgoxLqiqJoi6KsQAvDdz4jN/JXPsqWkoY0+2AwyDMEED6hMkkgsEYlU62X/JAlVAsrt2NZS1QA4TAuXB6xQZeNXU+F3g0IQZazogAACH5BAkKAAwALAAAAAAWAAoAAARYMJDAWChIrb0UOiBYBEZiCIKhAWzLcYoKeBmw2Jzdtsn96r/cJuYT4jZHWyxw2wGFyAWiUow6k4tDRTFD1F5DL1dRqJROqcQndCigzhTLpCIRVO53SZwRAQAh+QQJCgAMACwAAAAAFgAKAAAEVTCQwJgc5WiN1PqLYhiJIQhk4oEf4L4qoCAdsLwvaIfGzdq7lo4X8A2DRh+icsMBf8MDE/kcthSFikJG2zZxM0SJwiCZUAkVS3SaVCxuOGZzKJDflQgAOw=="
                                data-filename="81B35F67-C1B3-4A41-A765-E870FB7617F2.gif"
                                style="font-family: inherit; font-size: 1rem; color: rgb(255, 255, 0); width: 22px;">
                            <font color="#ffff00" style="font-family: inherit; font-size: 1rem;">
                                <font face="Arial"><span style="font-weight: bolder;">-GIÁ VÀNG 2sv (mua 150tv tặng 1 bộ
                                        nrb)</span></font>
                            </font>
                            <font color="#ffff00" style="font-family: inherit; font-size: 1rem;">
                                <font face="Arial"><span style="font-weight: bolder;"><br></span></font>
                            </font><b style="color: rgb(255, 255, 0); font-family: Arial; font-size: 1rem;">bán vàng 4.0
                                10k 40tv&nbsp;<br></b><b
                                style="color: rgb(255, 255, 0); font-family: Arial; font-size: 1rem;">qua card 3.5 10k
                                35tv</b>
                        </h6>
                        <h6><b style="color: rgb(255, 255, 0); font-family: Arial; font-size: 1rem;">- Nhập nick MTV
                                sll, zalo&nbsp;</b>
                            <font color="#ffff00"><b>0377928648</b></font>
                        </h6>
                        <h6 style=""><span style="font-weight: bolder; font-family: Arial;">
                                <font color="#ffff00">Tham gia GR FB </font><a href="#" target="_blank">
                                    <font color="#00ffff"></font>
                                </a>
                                <font color="#00ffff"><a href="#" target="_blank">&gt; tại đây &lt;</a></font><br>
                            </span>
                            <font face="Arial"><b>
                                    <font color="#ffff00">Tham gia box chat Zalo</font>
                                    <font color="#00ff00"> </font>
                                    <font color="#00ffff"><a href="#" target="_blank">&gt; tại
                                            đây &lt;</a></font>
                                </b></font>
                        </h6>
                        <p></p>
                        <h6></h6>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function FuncHideModal() {
    var x = document.getElementById("indexModal");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<script>
new ClipboardJS('.copy');
</script>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>