<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
        </div>
        <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
    <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>

        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="v-bg w-full mb-5">
                <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bol
                    THÔNG TIN TÀI KHOẢN</h2>
                <div class=" v-table-content-2"="">
                    <div class="py-3 px-4">
                        <table class="table-auto w-full">
                            <tbody class="text-sm select-text">
                                <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">ID TÀI KHOẢN</td>
                                    <td class="v-table-title font-bold px-2 py-2 text-white uppercase"><span class="py-1 px-3 bg-red-600 text-white rounded"><?= $data["user"] -> id ?></span>
                                    </td>
                                </tr>
                                <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">TÊN TÀI KHOẢN</td>
                                    <td class="v-table-title px-2 py-2 text-white"><?= $data["user"] -> username ?></td>
                                </tr>
                                <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">TÊN</td>
                                    <td class="v-table-title px-2 py-2 text-white"><?= $data["user"] -> fullname ?></td>
                                </tr>
                                 <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">SỐ DƯ</td>
                                    <td class="px-2 py-2 text-white"><b class="text-red-500"><?= $data["user"] -> money ?> VNĐ</b></td>
                                </tr>

                                 <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">NHÓM TÀI KHOẢN</td>
                                      <td class="v-table-title px-2 py-2 text-white"></td>
                                </tr>
                                 <tr class="v-border-hr-2 rounded-none border-b border-gray-200 py-10">
                                    <td class="v-account-text py-2 font-bold text-white">NGÀY THAM GIA</td>
                                    <td class="v-table-title px-2 py-2 text-white"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </h2></div>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>