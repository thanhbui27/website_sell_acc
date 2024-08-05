<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
        </div>
        <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
    <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>
     
    <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-2">
                <div class="rounded w-full">
                    <span>
                        <form method="POST" class="w-full">
                            <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                                KHU NẠP THẺ
                            </h2>
                            <div class="py-3 px-5">
                                <span class="mb-2 block">
                                    <div class="flex items-center relative">
                                        <select id="loaithe" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none"><option value="">✨ Loại Thẻ ✨</option>
                                                <option value="VIETTEL"> 🎫 Viettel 🎫</option>
                                                <option value="VINAPHONE"> 🎫 Vinaphone 🎫</option>
                                                <option value="MOBIFONE"> 🎫 Mobifone 🎫</option>
                                                <option value="ZING"> 🎫 Zing 🎫</option>
                                                <option value="VNMB"> 🎫 Vietnamobile 🎫</option></select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative">
                                        <select id="menhgia" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">  <option value="">💸 Chọn mệnh giá 💸</option>
                                                <option value="10000">&gt; 10.000 VNĐ 💵</option>
                                                <option value="20000">&gt; 20.000 VNĐ 💵</option>
                                                <option value="30000">&gt; 30.000 VNĐ 💵</option>
                                                <option value="50000">&gt; 50.000 VNĐ 💵</option>
                                                <option value="100000">&gt; 100.000 VNĐ 💵</option>
                                                <option value="200000">&gt; 200.000 VNĐ 💵</option>
                                                <option value="500000">&gt; 500.000 VNĐ 💵</option></select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><input type="number" id="pin" placeholder="Mã số thẻ" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><input type="number" id="seri" placeholder="Số serial" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                    </div>
                                </span>
                                <div class="mt-4 text-center">
                                    <button type="button" id="NapThe" class="uppercase flex w-40 font-semibold rounded items-center justify-center h-10 text-white text-xl rounded-none focus:outline-none px-4 text-center bg-red-500 hover:bg-red-600">
                                        Nạp Thẻ
                                    </button>
                                </div>
                                <div class="mt-2 text-red-500 font-semibold text-sm">
                                </div>
                            </div>
                        </form>
                    </span>
                    <!---->
                </div>
            </div>
            <div class="v-bg w-full mb-2 px-2">
                <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    LỊCH SỬ NẠP THẺ
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                    <table id="datatable" class="table-auto w-full scrolling-touch min-w-850 dataTable no-footer" >
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300"  style="width: 37px;">
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 90px;">
                                    STT                                                                          
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 90px;">
                                        NHÀ MẠNG
                                    </th><th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 112px;">
                                        M.GIÁ/T.NHẬN
                                    </th><th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 65px;">
                                        MÃ THẺ
                                    </th><th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 93px;">
                                        SERIAL THẺ
                                    </th><th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 99px;">
                                        TRẠNG THÁI
                                    </th><th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting"  style="width: 72px;">
                                        NẠP LÚC
                                    </th></tr>
                            </thead>
                            
                        </table>                    
                    </div>
                    <div class="v-table-note mt-1 py-1 font-semibold text-white text-sm">
                        Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    	
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>