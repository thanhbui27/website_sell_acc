<?php
$title = "LỊCH SỬ MUA NICK";
require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
    </div>
    <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
        <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
            <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>
            <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                <div class="w-full mb-10">
                    <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                        LỊCH SỬ MUA NICK
                    </h2>
                    <div class="v-table-content select-text">
                        <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                            <table id="datatable" class="table-auto w-full scrolling-touch min-w-850 dataTable no-footer">
                                <thead>
                                    <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 36px;">
                                            ACCID
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 64px;">
                                            DANH MỤC
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 61px;">
                                            SERVER GAME
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 65px;">
                                            TÀI KHOẢN
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 63px;">
                                            MẬT KHẨU
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 51px;">
                                            MUA GIÁ
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 92px;">
                                            THỜI GIAN MUA
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["history"] as $history) : ?>
                                        <tr>
                                            <td><?= $history->id ?></td>
                                            <td><?= $history->cate_game ?></td>
                                            <td><?= $history->name_server ?></td>
                                            <td><?= $history->tk_game ?></td>
                                            <td><?= $history->mk_game ?></td>
                                            <td><?= $history->amount ?></td>
                                            <td><?= $history->order_date ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="v-table-note mt-1 py-1 font-semibold text-white text-sm">
                            Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                        </div>
                    </div>
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