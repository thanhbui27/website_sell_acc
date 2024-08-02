<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="flex justify-center items-center px-4 py-8 md:px-0 md:py-0" style="height: calc(100vh - 80px)">
    <div class="w-full max-w-sm">
        <form method="POST" action="<?= URLROOT; ?>/auth/register"
            class="w-full border border-gray-400 shadow rounded bg-white py-4 px-6"
            style="border-radius: 13px;backdrop-filter: blur(6px);border: solid 2px white;background: linear-gradient(45deg, #ffffff82, #0099FF);max-width: 900px;max-height: 430px;box-shadow:0 0 15px #99FFFF;">
            <div class="text-white text-center text-2xl font-extrabold fontdanhmuc">
                ĐĂNG KÝ
            </div>
            <div class="border-t line w-32 mx-auto mt-1"></div>

            <?php if(!empty($data["message"])): ?>
            <div class="text-red-700 font-semibold"><?= $data["message"]; ?></div>
            <?php endif; ?>
            <span>
                <div class="mt-4">
                    <label class="block font-semibold fontdanhmuc mb-1  text-white text-sm"
                        style="font-size: 20px;padding-bottom: 4px;">Tên Đăng Nhập</label>
                    <input type="text" placeholder="Nhập tài khoản" name="username"
                        class="appearance-none bg-trueGray-900 block border-trueGray-600 focus:outline-none leading-tight px-3 py-2 rounded text-white w-full"
                        style="border-radius: 10px;background: #ffffff00;border:1px solid" required>
                    <span class="mt-1 flex items-center font-semibold tracking-wide text-red-500 text-xs"></span>
                </div>
            </span>

            <span>
                <div class="my-2">
                    <label class="block font-semibold fontdanhmuc mb-1 text-white text-sm"
                        style="font-size: 20px;padding-bottom: 4px;">Mật Khẩu</label>
                    <input autocomplete="" type="password" name="password" placeholder="Nhập mật khẩu"
                        class="appearance-none bg-trueGray-900 block border-trueGray-600 focus:outline-none leading-tight px-3 py-2 rounded text-white w-full"
                        style="border-radius: 10px;background: #ffffff00;border:1px solid" required>
                    <span class="mt-1 flex items-center font-semibold tracking-wide text-red-500 text-xs"></span>
                </div>
            </span>
            <span>
                <div class="my-2">
                    <label class="block font-semibold fontdanhmuc mb-1  text-white text-sm"
                        style="font-size: 20px;padding-bottom: 4px;">Nhập Lại Mật Khẩu</label>
                    <input autocomplete="" type="password" name="repassword" placeholder="Nhập lại mật khẩu"
                        class="appearance-none bg-trueGray-900 block border-trueGray-600 focus:outline-none leading-tight px-3 py-2 rounded text-white w-full"
                        style="border-radius: 10px;background: #ffffff00;border:1px solid" required>
                    <span class="mt-1 flex items-center font-semibold tracking-wide text-red-500 text-xs"></span>
                </div>
            </span>

            <center><button type="submit" id="Register"
                    class="flex focus:outline-none h-10 items-center justify-center p-1 px-8 rounded text-white text-xl w-full textss"
                    style=" background: #ffffff42;width: 200px;">
                    ĐĂNG KÝ
                </button>
            </center>
        </form>
    </div>
</div>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>