<?php 
$title = "ĐỔI MẬT KHẨU";
require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
        </div>
        <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
    <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>

    <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="v-bg w-full mb-5">
                <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    ĐỔI MẬT KHẨU</h2>
                <?php if(!empty($data["message"])): ?>
                <div class="text-red-700 font-semibold"><?= $data["message"]; ?></div>
                <?php endif; ?>
                <div class="v-table-content">
                    <div class="py-3 pt-5">
                        <form accept-charset="UTF-8" action="<?= URLROOT ?>/auth/changePassword"  method="POST" class="form-charge">
                            <input name="password" type="password" placeholder="Mật khẩu mới" required="required" class="mb-2 py-1 rounded-sm px-3 text-gray-800 focus:outline-none font-semibold border border-gray-500 bg-white">
                            <input name="repassword" type="password" placeholder="Nhập lại mật khẩu mới" required="required" class="mb-2 py-1 rounded-sm px-3 text-gray-800 focus:outline-none font-semibold border border-gray-500 bg-white">
                            <button type="submit" id="DoiMatKhau" class="py-1 text-white border border-red-600 px-3 bg-red-600 hover:bg-red-500 hover:border-red-500 font-semibold focus:outline-none" data-loading-text="<box-icon name='loader'></box-icon>">
                                ĐỔI MẬT KHẨU
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>