<?php
$title = "NAP ATM";
require_once APPROOT . '/src/views/include/header.php';
?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
    </div>
    <div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
        <div class="grid grid-cols-8 gap-4 md:p-4 chino-info-app">
            <?php require_once APPROOT . '/src/views/include/navAuth.php'; ?>

            <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                <div class="w-full mb-10">
                    <h2 class="v-title uppercase border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                        Nạp tiền qua ATM/MOMO
                    </h2>
                    <div class="mt-4 text-white">
                        <div class="p-2 border border-gray-300 mb-4">
                            <div class="flex justify-between items-center cursor-pointer">
                                <div class="flex select-none"><img src="https://nick789.com/assets/img/bank.png" class="h-10 w-10 rounded">
                                    <div class="ml-2 text-left">
                                        <h2 class="font-bold text-base">
                                            Chuyển khoản qua Ngân hàng &amp; Ví điện tử
                                        </h2>
                                        <p class="text-xs">Chuyển khoản ngân hàng online.</p>
                                    </div>
                                </div> <button class="select-none focus:outline-none bg-pink-600 text-white text-xs inline-block h-5 flex items-center justify-center font-semibold px-2 rounded">
                                    Auto
                                </button>
                            </div>
                            <div>
                                <div class="border-t border-gray-200 mt-2 p-2 select-text">
                                    <div class="relative">
                                        <p>
                                            <font color="#ffffff"><b>100k ATM =&nbsp; 100k Trên Shop</b></font>
                                        </p>
                                        <p>
                                            <font color="#ffffff" style="font-size: 1rem;"><b>!! Lưu Ý : Bank Sai Nội Dung Chuyển Khoản Trừ 10%</b></font><strong style="font-size: 1rem;">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;" color="#ffffff">&nbsp;Tiền</font>
                                                </font>
                                            </strong><br>
                                        </p>
                                        <p>
                                            <font color="#ff0000" style="background-color: rgb(247, 247, 247);"><span class="text-big" style=""><strong style="">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">nạp tiền quá 10 phút chưa cộng tiền ib zalo :&nbsp;</font>
                                                        </font>
                                                    </strong></span><span style="font-size: 20px; font-weight: 700;">0377928648</span></font>
                                        </p>
                                        <p style="margin-left: 0px;">&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p><strong>THÔNG TIN TÀI KHOẢN NGÂN HÀNG</strong></p>
                                        <p style="margin-left: 0px;"><span style="color: rgb(43, 0, 254);"><strong>✔ :&nbsp;
                                                    MB BANK</strong></span></p>
                                        <p style="margin-left: 0px;"><strong>Chủ tài khoản:
                                                Nguyen Ban A</strong>
                                        </p>
                                        <p style="margin-left: 0px;"><strong>STK/SDT: </strong><span style="color: red;"><strong>093450293502</strong></span></p>
                                        <p style="margin-left: 0px;"><strong></strong></p>
                                        <p style="margin-left: 0px;">&nbsp;</p>

                                    </div>
                                </div>
                                <div class="border-t border-gray-200 w-full select-text">
                                    <div class="p-2">
                                    <div>NNhập số tiền vào sau đó nhấn ok</div>
                                        <div class="mt-10 flex item-center gap-2">
                                            <div class="mb-3">
                                                <label for="money" class="div-label">Số tiền cần nap</label>
                                                <input type="number"  class="text-black form-control" id="money" name="money" >
                                            </div>                                      
                                            <button type="button" id="okBtn" class="btn btn-primary">OK</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 w-full select-text center" id="imgQR">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $("#okBtn").on("click", function(e){
       <?php if(isset($_SESSION["user"])): ?>
            if( $("#money").val() < 10000){
                alert("Số tiền cần nạp phải lớn hơn 10.000");
            }else{
                let money = $("#money").val()
            let content = `NAPTIENWEB <?= $_SESSION["user"]["username"] ?>`
            let img = `https://img.vietqr.io/image/<?=BANK?>-<?= ACCOUNT_BANK ?>-compact2.png?amount=${money}&addInfo=${content}&accountName=<?= $_SESSION["user"]["username"] ?>`
            $("#imgQR").html(`<img src="${img}" style="margin:auto">`)
        
            }
           
        <?php endif; ?>
    })
</script>

<?php require_once APPROOT . '/src/views/include/footer.php'; ?>