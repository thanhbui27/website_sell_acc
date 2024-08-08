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
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 p-2">
                <table id="tableAccount" class="table align-items-center mb-0 "  style="border-bottom:1px solid #efefef">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hình ảnh</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh mục</th>
                      <th ></th>                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data["game"] as $bill): ?>
                    <tr style="border-bottom: #efefef;">
                      <td>
                        <p  class="text-xs font-weight-bold mb-0"><?= $bill -> id ?></p>
                      </td>
                      <td>
                        <p  class="text-xs font-weight-bold mb-0"><?= $bill -> name ?></p>
                      </td>
                      <td>
                         <img src="<?= URLROOT ?>/<?= $bill -> image ?>" class="rounded" style="width: 120px" >
                      </td>
                      <td>
                        <p  class="text-xs font-weight-bold mb-0"><?= $bill -> title ?></p>
                      </td>
                      <td>
                        <Button class="btn btn-danger removeCate" data-id="<?= $bill -> id ?>">remove</Button>
                        <Button class="btn btn-warning editCate"  data-id="<?= $bill -> id ?>">edit</Button>
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

      <div class="modal fade" id="modalEditGame" tabindex="-1" role="dialog" aria-labelledby="modalEditGameLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditGameLabel">Thêm game mới</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;outline: none;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="formAddNewGame" method="post" enctype="multipart/form-data">
                <input type="hidden" value="edit" name="action" >
                <input type="hidden" id="id-hidden" name="id" >
                  <div class="form-group">
                    <label for="recipient-name"  class="col-form-label">Nhập Tên Game</label>
                    <input type="text" class="form-control" name="title" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Chon hình ảnh</label>
                    <input  class="form-control" type="file" name="image" id="formFile" accept="image/*">
                  </div>
                  <select class="form-select form-select-lg mb-3" name="id_cate" aria-label=".form-select-lg example">
                    <option value="0" selected>Open this select menu</option>
                    <?php foreach($data["category"] as $cate): ?>
                      <option value="<?= $cate -> id ?>"><?= $cate -> title ?></option>
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

      <script src="<?= URLADMINROOT ?>/assets/js/ajax/admin.js"></script>
    <script> 
      $(document).ready(function() {
        $('#tableAccount').DataTable();
        $(".close").on("click", function(){
          $('#modalEditGame').modal('hide')
        })

        $(document).on('click', '.editCate', function() {    
          $("#id-hidden").val($(this).attr("data-id"))
          $('#modalEditGame').modal('show')
        })
        
        
        $('#formAddNewGame').submit(function(e) {
          e.preventDefault();
          var form = document.getElementById('formAddNewGame');
          var formData = new FormData(form);
          performActionForm({
            url : "<?= URLADMINROOT ?>/dashboard/games/game/action",
            method : "POST",
            dataCustom : formData,
            confirmTitle : "Bạn có muốn thêm  game không",
            idBtn:"#saveNewGame",
            confirmText:"Bạn chắc chứ",
            failureTitle : "Thêm thất bại",
            confirmButtonText : "Lưu",
            processData: false, 
            contentType: false, 
          })
         
        });

        $("#saveNewGame").on("click", function() {
          $('#formAddNewGame').submit();
        });

        $(document).on('click', '.removeCate', function() {    
          console.log($(this).attr("data-id"))
          performAction({
            url : "<?= URLADMINROOT ?>/dashboard/games/game/action",
            method : "POST",
            dataCustom : {
              action : "remove",
              id : $(this).attr("data-id"),              
            },
            confirmTitle : "Bạn có muốn Xoá danh mục game không",
            idBtn:"#saveModalCate",
            confirmText:"Bạn chắc chứ, việc này sẽ xoá luôn server_game và account game",
            failureTitle : "Xoá thất bại",
            confirmButtonText : "Xoá",

          })
        })

      })
     </script>
  
      
<?php require_once APPROOT . '/src/views/admin/include/footer.php'; ?>