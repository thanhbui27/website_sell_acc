<?php
$title = "Quản lý Game / Danh mục Game";
require_once APPROOT . '/src/views/admin/include/sidebar.php';
?>
<script src="<?= URLROOT; ?>/template/theme/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"> </script>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>List Server Game</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 p-2">
                    <table id="tableAccount" class="table align-items-center mb-0 " style="border-bottom:1px solid #efefef">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên game</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Server game</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hình ảnh</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">giá</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tài khoản</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mật khẩu</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rank</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">miêu tả</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["account"] as $bill) : ?>
                                <tr style="border-bottom: #efefef;">
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->id ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->name ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->name_game ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->name_server ?></p>
                                    </td>
                                    <td>
                                        <img src="<?= URLROOT ?>/<?= $bill->image ?>" class="rounded" style="width: 120px; height : 120px; object-fit:cover">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->price ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->account_username ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->account_password ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->rank ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $bill->description ?></p>
                                    </td>
                                    <td>
                                        <?php if ($bill->status == 0) : ?>
                                            <p class="text-xs font-weight-bold mb-0 text-warning">Chưa bán</p>
                                        <?php else : ?>
                                            <p class="text-xs font-weight-bold mb-0 text-success">Đã bán</p>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <Button class="btn btn-danger removeCate" data-id="<?= $bill->id ?>">remove</Button>
                                        <Button class="btn btn-warning editCate" data-id="<?= $bill->id ?>">edit</Button>
                                        <Button class="btn btn-warning addImage" data-id="<?= $bill->id ?>">Thêm hình ảnh</Button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddNewAccountGame" tabindex="-1" role="dialog" aria-labelledby="modalAddNewAccountGameLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewAccountGameLabel">Thêm account game mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddNewAccountGame" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="edit" name="action">
                    <input type="hidden" id="id-hidden" name="id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nhập Tên Game</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nhập Giá</label>
                        <input type="number" class="form-control" name="price" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rank game</label>
                        <input type="text" class="form-control" name="rank" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">tài khoản game</label>
                        <input type="text" class="form-control" name="tk" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mật khẩu game</label>
                        <input type="text" class="form-control" name="mk" id="recipient-name">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Chon hình ảnh</label>
                        <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                    </div>

                    <select class="form-select form-select-lg mb-3" id="getGame" name="id_game" aria-label=".form-select-lg example">
                        <option value="0" selected>Chọn loại game</option>
                        <?php foreach ($data["game"] as $game) : ?>
                            <option value="<?= $game->id ?>"><?= $game->name ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-select form-select-lg mb-3" name="id_server" id="getServer" aria-label=".form-select-lg example">

                    </select>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Miêu tả account</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveNewAccountGame">Lưu</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade " id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalImageGameLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImageGameLabel">Hình ảnh game</h5>
                <button type="button" class="close" id="closeM" data-dismiss="modal" aria-label="close" style="background: transparent;border: none;outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-start align-items-center flex-wrap gap-2" id="listImages">

                </div>
            </div>
            <div class="modal-footer">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" id="acGameId" name="id">
                        <label for="formFile" class="form-label">Chon hình ảnh</label>
                        <input class="form-control" type="file" name="files[]" id="fileInput" accept="image/*" multiple>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?= URLADMINROOT ?>/assets/js/ajax/admin.js"></script>
<script>
    $(document).ready(function() {

        $('#fileInput').on('change', function() {
            var formData = new FormData($('#uploadForm')[0]);
            $.ajax({
                url: "<?= URLADMINROOT ?>/dashboard/games/account-game/addImages", // URL của file PHP xử lý upload
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Thêm ảnh thành công',
                            icon: 'success',
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            title: 'Thất bại',
                            text: 'Thêm ảnh thất bại',
                            icon: 'error',
                        })
                    }

                },
                error: function() {
                    Swal.fire({
                        title: 'Thất bại',
                        text: 'Thêm ảnh thất bại',
                        icon: 'error',
                    })
                }
            });
        });


        $('#tableAccount').DataTable();

        $(".close").on("click", function() {
            $('#modalAddNewAccountGame').modal('hide')
        })
        $("#closeM").on("click", function() {
            $('#modalImage').modal('hide')
        })


        $(document).on('click', '.imgRemove', function() {
            Swal.fire({
                title: "Bạn có muốn xoá hình này không",
                text: "Xoá hình này sẽ bị xoá vĩnh viễn khỏi cơ sở dữ liệu",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ok",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= URLADMINROOT ?>/dashboard/games/account-game/removeImage",
                        method: "POST",
                        data: {
                            id: $(this).attr("data-idImg")
                        },
                        success: function(response) {
                            console.log(response)
                            if (response.status === "success") {
                                Swal.fire({
                                    title: 'Thành công',
                                    text: 'xoá ảnh thành công',
                                    icon: 'success',
                                });
                                 location.reload();
                            } else {
                                Swal.fire({
                                    title: 'Thật bại',
                                    text: 'xoá ảnh thất bại',
                                    icon: 'error',
                                });
                                location.reload();
                            }
                        },
                        error : function(e){
                            console.log(e)
                        }
                    });
                } else {
                    console.log("thoat")
                }
            });
        })

        $(document).on('click', '.editCate', function() {
            $("#id-hidden").val($(this).attr("data-id"))
            $('#modalAddNewAccountGame').modal('show')
        })

        $(document).on('click', '.addImage', function() {
            $("#acGameId").val($(this).attr("data-id"))
            $.ajax({
                url: "<?= URLADMINROOT ?>/dashboard/games/account-game/getImage",
                method: "POST",
                data: {
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    if (response.status === "success") {
                        $('#listImages').html('')
                        let images = ''
                        let data = response.data;
                        let result = data.map(img => images + `<img src="<?= URLROOT ?>/${img.image}" data-idImg="${img.id}" class="rounded imgRemove" style="width: 200px; height : 200px; object-fit:cover">`)
                        $('#listImages').html(result)
                    } else {
                        Swal.fire({
                            title: 'Thất bại',
                            text: response.message,
                            icon: response.status,
                        })
                        $(this).html('Lock').prop('disabled', false);
                    }
                }
            });
            $('#modalImage').modal('show')
        })

        $('#getGame').on('change', function() {
            $.ajax({
                url: "<?= URLADMINROOT ?>/dashboard/games/getServerGame",
                method: "POST",
                data: {
                    id: this.value
                },
                success: function(response) {
                    if (response.status === "success") {
                        $('#getServer').html('')
                        let data = response.data;
                        let result = data.map(option => `<option value="${option.id}" >${option.name}</option>`)
                        $('#getServer').html(result)
                    } else {
                        Swal.fire({
                            title: 'Thất bại',
                            text: response.message,
                            icon: response.status,
                        })
                        $(this).html('Lock').prop('disabled', false);
                    }
                }
            });
        });

        $('#formAddNewAccountGame').submit(function(e) {
            e.preventDefault();
            var form = document.getElementById('formAddNewAccountGame');
            var formData = new FormData(form);
            performActionForm({
                url: "<?= URLADMINROOT ?>/dashboard/games/account-game/action",
                method: "POST",
                dataCustom: formData,
                confirmTitle: "Bạn có muốn edit game không",
                idBtn: "#saveNewAccountGame",
                confirmText: "Bạn chắc chứ",
                failureTitle: "Chỉnh sửa thất bại",
                confirmButtonText: "Lưu",
                processData: false,
                contentType: false,
            })

        });

        $("#saveNewAccountGame").on("click", function() {
            $('#formAddNewAccountGame').submit();
        });

        $(document).on('click', '.removeCate', function() {
            console.log($(this).attr("data-id"))
            performAction({
                url: "<?= URLADMINROOT ?>/dashboard/games/account-game/action",
                method: "POST",
                dataCustom: {
                    action: "remove",
                    id: $(this).attr("data-id"),
                },
                confirmTitle: "Bạn có muốn Xoá danh mục game không",
                idBtn: "#saveModalCate",
                confirmText: "Bạn chắc chứ, việc này sẽ xoá luôn server_game và account game",
                failureTitle: "Xoá thất bại",
                confirmButtonText: "Xoá",

            })
        })

    })
</script>


<?php require_once APPROOT . '/src/views/admin/include/footer.php'; ?>