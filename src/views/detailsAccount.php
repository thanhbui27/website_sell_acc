<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="mt-12 relative w-full max-w-6xl mx-auto text-gray-800 pb-8 px-2 md:px-0">
    <div class="dark:text-white md:ml-0 mb-4 text-left inline-block uppercase py-1 md:text-2xl text-xl font-extrabold">

    <p class="text-sm text-red-500 uppercase">DANH MỤC: <?= $data["game"]->sever_name  ?></p>
    </div>
    <div class="dark:text-white md:ml-0 mb-4 text-left inline-block uppercase py-1 md:text-2xl text-xl font-extrabold"><?= $data["game"]->name  ?> #<?= $data["game"]->id  ?> </div>
    <div class="sticky col-span-12 grid grid-cols-10 gap-2 select-none py-2 px-2 color-grant text-xl font-bold rounded" style="background: rgb(37 37 37); top: 60px; index: 98;">
        <div class="col-span-10 md:col-span-5">
            <div class="flex items-center flex-wrap text-yellow-500 pt-3">
                <div class="relative">
                <?= $data["game"]->price  ?> đ
                    <span class="absolute" style="top: -18px; left: 1px; font-size: 0.7rem;">
                        GIÁ BÁN
                    </span>
                </div>
            </div>
        </div>
        <div class="v-skull-top col-span-10 md:col-span-5 text-yellow-500 flex justify-end items-center flex-wrap">
            <?php if(isset($_SESSION["user"])) : ?>
            <button class="ml-4 flex bg-red-500 text-white items-center justify-center h-10 text-2xl rounded focus:outline-none px-4 text-center" id="btnThanhToan">
                MUA NGAY
            </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="mt-4">
        <div class="v-account-detail p-2 md:px-0 mt-5">
            <div class="v-infomations border-t border-b border-gray-700 py-4 mb-10">
                <div class="w-full grid grid-cols-12 gap-4">
                    <div class="uppercase col-span-6 md:col-span-3 text-base md:text-xl font-semibold text-center"><span class="text-gray-700">  <?= $data["game"] ->description  ?></span> <b class="text-red-600"> </b></div>
                </div>
            </div>
        </div>
        <div class="v-account-detail p-2 md:px-0 mt-4">
            <div class="v-account-detail-1" id="taikhoan">
                <div class="mb-10">
                    <?php if(!empty($data["image"])) : ?>
                        <?php foreach($data["image"] as $image): ?>
                                <img src="<?= URLROOT ?>/<?= $image -> image ?>" data-sizes="auto" class="border border-gray-400 mb-2 w-full lazyLoad lazy">          
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="thongbao"></div>
<script type="text/javascript">
$("#btnThanhToan").on("click", function() {
    $('#btnThanhToan').html('ĐANG XỬ LÝ').prop('disabled',true);

    Swal.fire({
        title: 'Xác Nhận Thanh Toán',
        text: "Bạn có đồng ý mua nick này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Mua ngay'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= URLROOT ?>/server-game/acc/order",
                method: "POST",
                data: {
                    id: <?= $data["game"]->id ?>                
                },
                success: function(response) {
                    if(response.status === "success"){
                        Swal.fire({
                            title: 'Thanh toán thành công',
                            text: response.message,
                            icon: response.status,
                        }).then((rs) => {
                            if(rs.isConfirmed){
                                window.location.href = '<?= URLROOT ?>/auth/historyBuy';
                            }else{
                                window.location.href = '<?= URLROOT ?>/auth/historyBuy';
                            }
                        })
                    $('#btnThanhToan').html('THANH TOÁN').prop('disabled', false);
                    }else{
                        Swal.fire({
                            title: 'Thất bại',
                            text: response.message,
                            icon: response.status,
                        })
                        $('#btnThanhToan').html('THANH TOÁN').prop('disabled', false);
                    }        
                }
            });
        } else {
            
            $('#btnThanhToan').html('THANH TOÁN').prop('disabled', false);
        }
    })



});
</script>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>