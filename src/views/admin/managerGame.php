<?php
$title = "Quản lý Game";
require_once APPROOT . '/src/views/admin/include/sidebar.php';
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold">Quản lý Danh mục game</p>
              <h5 class="font-weight-bolder">Danh mục</h5>
              <p class="mb-5">Tạo ra các danh mục game mới ví dụ như (liên quân, liên minh...)</p>
              <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddGame">
                  Thêm danh mục game mới
                </button>
                <a href="<?= URLADMINROOT ?>/dashboard/games/cate-game">
                  <button type="button" class="btn btn-primary">
                    Xem danh sách danh mục game hiện có
                  </button>
                </a>
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
            <div class="bg-gradient-primary border-radius-lg h-100">
              <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
              <div class="position-relative d-flex align-items-center justify-content-center h-100">
                <img class="w-100 position-relative z-index-2 pt-4" src="../assets/img/illustrations/rocket-white.png" alt="rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
        <span class="mask bg-gradient-dark"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Tạo game cho danh mục</h5>
          <p class="text-white">Tạo game cho danh mục, ví dụ danh mục game ngọc rồng thì sẽ có ngọc rông hakai, ngọc rông honkai....</p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNewGame">
              Thêm Game mới
            </button>
            <a href="<?= URLADMINROOT ?>/dashboard/games/game">
              <button type="button" class="btn btn-primary">
                Xem danh sách game hiện tại
              </button>
            </a>
            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2">
      <div class="card-body p-3">
        <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
          </div>
        </div>
        <h6 class="ms-2 mt-4 mb-0"> Thêm server cho game </h6>
        <p class="text-sm ms-2"> Thêm server mới cho game. ví dụ game nro thì sẽ có server 1 2 3 </p>
        <div class="container border-radius-lg">
          <div class="row">
            <div class="col-6 py-3 ps-0">
              <div class="d-flex mb-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNewServerGame">
                  Thêm Server Game mới
                </button>
              </div>
            </div>
            <div class="col-6 py-3 ps-0">
              <div class="d-flex mb-2">
                <a href="<?= URLADMINROOT ?>/dashboard/games/server-game">
                  <button type="button" class="btn btn-primary">
                    Xem danh sách server game hiện tại
                  </button>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h6>Thêm account game</h6>
        <p class="text-sm">
          <i class="fa fa-arrow-up text-success"></i>
          Thêm account cho game
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart" style="height: 300px;">
          <div class="d-flex mb-2 gap-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNewAccountGame">
              Thêm account Game mới
            </button>
            <a href="<?= URLADMINROOT ?>/dashboard/games/account-game">
              <button type="button" class="btn btn-primary">
                Xem danh sách server game hiện tại
              </button>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAddGame" tabindex="-1" role="dialog" aria-labelledby="modalAddGameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddGameLabel">Thêm danh mục game mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;outline: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Nhập Tên danh mục</label>
          <input type="text" class="form-control" name="title" id="recipient-name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveModalCate">Lưu</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddNewGame" tabindex="-1" role="dialog" aria-labelledby="modalAddNewGameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddNewGameLabel">Thêm game mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;outline: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAddNewGame" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nhập Tên Game</label>
            <input type="text" class="form-control" name="title" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Chon hình ảnh</label>
            <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
          </div>
          <select class="form-select form-select-lg mb-3" name="id_cate" aria-label=".form-select-lg example">
            <option value="0" selected>Open this select menu</option>
            <?php foreach ($data["category"] as $cate) : ?>
              <option value="<?= $cate->id ?>"><?= $cate->title ?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveNewGame">Lưu</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddNewServerGame" tabindex="-1" role="dialog" aria-labelledby="modalAddNewServerGameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddNewServerGameLabel">Thêm Server game mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;outline: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAddNewServerGame" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nhập Tên server Game</label>
            <input type="text" class="form-control" name="title" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Chon hình ảnh</label>
            <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
          </div>
          <select class="form-select form-select-lg mb-3" name="id_game" aria-label=".form-select-lg example">
            <option value="0" selected>Open this select menu</option>
            <?php foreach ($data["game"] as $game) : ?>
              <option value="<?= $game->id ?>"><?= $game->name ?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveNewServerGame">Lưu</button>
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




<script src="<?= URLADMINROOT ?>/assets/js/ajax/admin.js"></script>
<script>
  $(document).ready(function() {

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
            let result = data.map(option =>`<option value="${option.id}" >${option.name}</option>`)
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
        url: "<?= URLADMINROOT ?>/dashboard/games/addNewAccountGame",
        method: "POST",
        dataCustom: formData,
        confirmTitle: "Bạn có muốn thêm account game không",
        idBtn: "#saveNewAccountGame",
        confirmText: "Bạn chắc chứ",
        failureTitle: "Thêm thất bại",
        confirmButtonText: "Lưu",
        processData: false,
        contentType: false,
      })
    });

    $("#saveNewAccountGame").on("click", function() {
      $('#formAddNewAccountGame').submit();
    });


    $('#formAddNewServerGame').submit(function(e) {
      e.preventDefault();
      var form = document.getElementById('formAddNewServerGame');
      var formData = new FormData(form);
      performActionForm({
        url: "<?= URLADMINROOT ?>/dashboard/games/addNewServerGame",
        method: "POST",
        dataCustom: formData,
        confirmTitle: "Bạn có muốn thêm server game không",
        idBtn: "#saveNewServerGame",
        confirmText: "Bạn chắc chứ",
        failureTitle: "Thêm thất bại",
        confirmButtonText: "Lưu",
        processData: false,
        contentType: false,
      })

    });

    $("#saveNewServerGame").on("click", function() {
      $('#formAddNewServerGame').submit();
    });



    $('#formAddNewGame').submit(function(e) {
      e.preventDefault();
      var form = document.getElementById('formAddNewGame');
      var formData = new FormData(form);
      performActionForm({
        url: "<?= URLADMINROOT ?>/dashboard/games/addNewGame",
        method: "POST",
        dataCustom: formData,
        confirmTitle: "Bạn có muốn thêm  game không",
        idBtn: "#saveNewGame",
        confirmText: "Bạn chắc chứ",
        failureTitle: "Thêm thất bại",
        confirmButtonText: "Lưu",
        processData: false,
        contentType: false,
      })

    });

    $("#saveNewGame").on("click", function() {
      $('#formAddNewGame').submit();
    });

    $("#saveModalCate").on("click", function() {
      performAction({
        url: "<?= URLADMINROOT ?>/dashboard/addCategory",
        method: "POST",
        dataCustom: {
          title: $('#recipient-name').val()
        },
        confirmTitle: "Bạn có muốn thêm danh mục game không",
        idBtn: "#saveModalCate",
        confirmText: "Bạn chắc chứ",
        failureTitle: "Thêm thất bại",
        confirmButtonText: "Lưu",
      })
    })

  })
</script>
<?php require_once APPROOT . '/src/views/admin/include/footer.php'; ?>