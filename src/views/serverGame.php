<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<div class="pb-10">
    <div class="v-card w-full max-w-6xl mx-auto">
        <div class="md:mx-0">
            <div class="py-2">
                <div class="mb-16">
                    <div class="mb-4 py-4 md:p-4 chino-mac-app">
                        <div
                            class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center chino-cursive chino-text-cyan-green md:text-3xl text-2xl font-extrabold">
                            Danh Mục <?= $data["game"] -> name ?> </div>
                        <div class="mb-6 chino_title">
                            <div class="mx-auto block w-40 border-2 border-red-500"></div>
                        </div>
                        <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                            <?php foreach($data["server_games"] as $server_game): ?>
                            <div class="hover:shadow-lg col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 relative rounded border border-gray-300"
                                style="padding: 1px; padding: 1px;border: 3px solid #00afdb;">
                                <!---->
                                <a href="<?= URLROOT ?>/server_game/acc/<?= $server_game["id"] ?>">
                                    <img data-src="<?= URLROOT ?>/<?= $server_game["image"] ?>"
                                        class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad"
                                        src="<?= URLROOT ?>/<?=  $server_game["image"] ?>">
                                </a>
                                <div class="py-1"><a href="<?= URLROOT ?>/server_game/acc/<?= $server_game["id"] ?>">
                                        <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                            style="color: rgb(247, 176, 60);">
                                            <?= $server_game["name"] ?> </div>
                                        <ul class="px-2 flex items-center justify-center font-medium rounded-sm w-full font-medium text-gray-700"
                                            style="color: white">
                                            <span>
                                                Số tài khoản:
                                                <b><?= $server_game["num_account"] ?> </b>
                                            </span>
                                        </ul>
                                        <div class="flex px-2 mt-2 justify-center">
                                        </div>
                                    </a>
                                    <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9"><a
                                            href="<?= URLROOT ?>/server-game/acc/<?= $server_game["id"] ?>">
                                        </a><a class="focus:outline-none acc-lien-minh-tu-chon-bb2716012b"
                                            href="<?= URLROOT ?>/server-game/acc/<?= $server_game["id"] ?>">
                                            <div>
                                                <style scoped="">
                                                .acc-lien-minh-tu-chon-bb2716012b:hover {
                                                    filter: brightness(130%);
                                                }
                                                </style>
                                            </div> <img src="<?= URLROOT ?>/template/theme/assets/image/bg-btn-buy.png"
                                                class="lazyLoad isLoaded">
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>