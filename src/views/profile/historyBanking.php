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
                                            transactionID
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 64px;">
                                            amount
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 61px;">
                                            description
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 65px;">
                                            transactionDate
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 63px;">
                                            username
                                        </th>
                                        <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1 sorting" style="width: 51px;">
                                            Trạng thái
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data["status"]) && $data["status"] == "success") : ?>
                                        <?php foreach ($data["transactions"]  as $trans): ?>
                                            <tr>
                                                <td><?= $trans["transactionID"] ?></td>
                                                <td><?= $trans["amount"] ?></td>
                                                <td><?= $trans["description"] ?></td>
                                                <td><?= $trans["transactionDate"] ?></td>
                                                <td><?= $trans["username"] ?></td>
                                                <?php if ($trans["approved"] == 0): ?>
                                                    <td><button data-id="<?= $trans["transactionID"] ?>" class="approveBanking focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Nhận tiền</button></td>
                                                <?php else: ?>
                                                    <td>
                                                        <p class="text-red">Đã nhận</p>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td><?= $data["message"] ?></td>
                                        </tr>
                                    <?php endif; ?>
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

        $(document).on('click', '.approveBanking', function() {
            $(this).html('Đang nhận').prop('disabled', false);
            $.ajax({
                url: "<?= URLROOT ?>/auth/approvedBanking",
                method: "POST",
                data: {
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Nhận tiền thành công',
                            icon: 'success',
                        });
                        
                        location.reload();
                    } else {
                        Swal.fire({
                            title: 'Thất bại',
                            text: 'Nhận tiền Thất bại',
                            icon: 'error',
                        });
                        location.reload();
                        $(this).html('Đang nhận').prop('disabled', false);
                    }
                }
            });
        })

    });
</script>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>