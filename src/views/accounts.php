<?php require_once APPROOT . '/src/views/include/header.php'; ?>

<div class="pb-10">
    <div class="v-card w-full max-w-6xl mx-auto">
        <div class="md:mx-0">
            <div class="py-2">
                <div class="mb-16">
                    <div class="mb-4 py-4 md:p-4 chino-mac-app">
                        <div
                            class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center chino-cursive chino-text-cyan-green md:text-3xl text-2xl font-extrabold">                      
                            <?= $data["serverGame"]  -> name?>
                        </div>
                        <div class="border border-primary p-3 bg-white rounded-lg mb-3">
                            <p>
                                <span
                                    style="margin: 0px; padding: 0px; font-weight: 700; color: rgb(50, 122, 213); font-family: 'Roboto Condensed', sans-serif; font-size: 17px; background-color: rgb(224, 235, 249);">
                                    <span style="margin: 0px; padding: 0px; font-size: 20px;">Nhập nick MTV sll,
                                        zalo&nbsp;</span>
                                    <span style="font-size: 20px;">04913242323</span><br
                                        style="margin: 0px; padding: 0px;">
                                </span>
                                <span
                                    style="margin: 0px; padding: 0px; font-weight: 700; font-family: 'Roboto Condensed', sans-serif; font-size: 17px; background-color: rgb(224, 235, 249);">
                                    <span style="margin: 0px; padding: 0px; font-size: 20px;">
                                        <font color="#327ad5">Tham gia box chat Zalo&nbsp;</font>
                                        <a href="#"
                                            style="margin: 0px; padding: 0px; transition: back 0.2s ease-out 0s; outline: none !important;">
                                            <font color="#ff0000">&gt;&gt; tại đây &lt;&lt;</font>
                                        </a>
                                        <br style="margin: 0px; padding: 0px;">
                                        <font color="#327ad5">Tham gia GR FB&nbsp;</font>
                                    </span>
                                </span>
                                <a href="#"
                                    style="margin: 0px; padding: 0px; background-color: rgb(224, 235, 249); transition: back 0.2s ease-out 0s; font-family: 'Roboto Condensed', sans-serif; font-size: 17px; outline: none !important;">
                                    <span style="margin: 0px; padding: 0px; font-weight: 700;">
                                        <span style="margin: 0px; padding: 0px; font-size: 20px;">
                                            <font color="#ff0000">&gt;&gt; tại đây &lt;&lt;</font>
                                        </span>
                                    </span>
                                </a>
                                <br
                                    style="margin: 0px; padding: 0px; color: rgb(50, 122, 213); font-family: 'Roboto Condensed', sans-serif; font-size: 17px; background-color: rgb(224, 235, 249);">
                                <font face="Roboto Condensed, sans-serif" color="#ff0000">
                                    <span
                                        style="font-size: 26px; background-color: rgb(224, 235, 249);"><b>!!!&nbsp;</b></span>
                                </font>
                                <span
                                    style="background-color: rgb(224, 235, 249); font-family: 'Roboto Condensed', sans-serif; font-size: 18px; font-weight: 700;">
                                    Mua Acc Vui Lòng Đổi Mật Khẩu Trước Khi Vào Game<br>
                                </span>
                                <span
                                    style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px; font-weight: 700; background-color: rgb(224, 235, 249);">
                                    Đổi Mật Khẩu
                                </span>
                                <a href="#"
                                    style="background-color: rgb(224, 235, 249); margin: 0px; padding: 0px; transition: back 0.2s ease-out 0s; font-family: 'Roboto Condensed', sans-serif; font-size: 17px; outline: none !important;">
                                    <span style="margin: 0px; padding: 0px; font-weight: 700;">
                                        <span style="margin: 0px; padding: 0px; font-size: 20px;">
                                            <font color="#ff0000">&gt;&gt; tại đây &lt;&lt;</font>
                                        </span>
                                    </span>
                                </a>
                                <span
                                    style="background-color: rgb(224, 235, 249); font-family: 'Roboto Condensed', sans-serif; font-size: 18px; font-weight: 700;"><br></span>
                            </p>
                        </div>

                        <div class="v-text-1 mb-4">
                            <form class="grid grid-cols-8 gap-2 md:gap-6" action="<?= URLROOT ?>/server-game/acc/<?= $data["serverGame"]  -> id ?>/filter" method="POST">
                                <input value="3" name="id" type="hidden">
                                <div class="col-span-8 sm:col-span-2 flex">
                                    <div class="flex -mr-px"><span
                                            class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3">Mã
                                            số</span></div>
                                    <div class="flex items-center relative w-full">
                                        <input name="id_acc" placeholder="Ví dụ: 123421"
                                            class="border-2 border-gray-300 rounded-none bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                    </div>
                                </div>
                                <div class="col-span-8 sm:col-span-2 flex">
                                    <div class="flex -mr-px"><span
                                            class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3">Giá
                                            từ</span></div>
                                    <div class="flex items-center relative w-full">
                                        <select name="amount"
                                            class="border-2 border-gray-300 rounded-none bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                            <option value="">Tìm theo giá</option>
                                            <option value="0-50000">0 - 50.000</option>
                                            <option value="50000-10000">50.000 - 100.000</option>
                                            <option value="100000-200000">100.000 - 200.000</option>
                                            <option value="200000-500000">200.000 - 500.000</option>
                                            <option value="500000-100000000">&gt; 500.000</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                class="fill-current h-4 w-4">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-8 sm:col-span-2 flex items-center">
                                    <button type="submit"
                                        class="mr-1 bg-red-600 text-white w-full rounded-none font-bold py-2 px-4 rounded focus:outline-none">
                                        Tìm kiếm
                                    </button>
                                    <a href="<?= URLROOT ?>/server-game/acc/<?= $data["serverGame"]  -> id ?>"
                                        class="ml-1 bg-gray-700 w-full text-white rounded-none font-bold py-2 px-4 rounded focus:outline-none">
                                        <button type="button"
                                            class="bg-gray-700 w-full text-white rounded-none font-bold rounded focus:outline-none">
                                            Tất cả
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="my-2"></div>
                        <div class="my-6 v-item-account">
                            <div class="grid grid-cols-8 gap-2 md:gap-4">
                                <?php foreach($data["accountGame"] as $account): ?>
                                    <div class="fade-in col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 border border-gray-300 relative"
                                        style="padding: 1px;">
                                        <div>
                                            <div class="relative">
                                                <a href="<?= URLROOT ?>/server-game/acc/<?= $account -> id?>/detail">
                                                    <div class="relative">
                                                        <img class="h-56 md:h-40 w-full object-fill object-center lazyLoad"
                                                            data-src="<?= URLROOT ?>/<?= $account -> image ?>"
                                                            src="<?= URLROOT ?>/<?= $account -> image ?>">
                                                        <span
                                                            class="absolute v-text-1 bg-red-700 text-white font-bold text-sm inline-block px-2 rounded-sm"
                                                            style="right: 5px; top: 5px;"><?= $account -> id?></span>
                                                    </div>
                                                </a>
                                                <div class="py-2 bg-gray-200 px-2"></div>
                                                <div class="my-2 py-2 px-2 relative">
                                                    <div
                                                        class="grid grid-cols-12 gap-3 text-gray-700 font-medium text-sm">
                                                        <div class="col-span-6 text-center">
                                                            <p style="color: white">
                                                            <?= $account -> description?>
                                                                <b class="text-gray-800"> </b>
                                                            </p>
                                                        </div>
                                                        <div class="col-span-6 text-center">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 rounded-b-sm grid grid-cols-12 gap-5 p-2">
                                                    <div class="col-span-6">
                                                        <ul class="v-text-1 rounded-sm w-full font-medium"
                                                            style="font-weight: 500;">
                                                            <p
                                                                class="w-full border border-red-600 text-center rounded text-red-600 block px-3 py-1">
                                                                <?= $account -> price?>
                                                            </p>
                                                        </ul>
                                                    </div>
                                                    <div class="col-span-6">
                                                        <div class="w-full">
                                                            <a href="<?= URLROOT ?>/server-game/acc/<?= $account -> id?>/detail"
                                                                class="cursor-pointer border rounded w-full text-center cursor-pointer border-red-500 hover:border-yellow-500 bg-red-500 transition duration-200 hover:bg-yellow-500 text-white uppercase inline-block font-semibold py-1 px-3">
                                                                Chi tiết
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                            </div>
                            <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once APPROOT . '/src/views/include/footer.php'; ?>