<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
        </div>
        <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
    <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>

    <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-10">
                <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    BIẾN ĐỘNG SỐ DƯ
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">                
                        <table id="datatable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">MaGD</th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">Số tiền trức</th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">Số tiền thay đổi</th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">Số tiền hiện tại</th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">Thời gian</th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting sorting_asc">Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['balanceflu'] as $bf): ?>
                                     <tr>
                                        <td><?= $bf -> id ?></td>
                                        <td><?= $bf -> previousAmount ?></td>
                                        <td><?= $bf -> changeAmount ?></td>
                                        <td><?= $bf -> currentAmount ?></td>
                                        <td><?= $bf -> transactionDate ?></td>
                                        <td><?= $bf -> description ?></td>
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
<script type="text/javascript">
    	
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>