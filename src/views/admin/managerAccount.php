<?php require_once APPROOT . '/src/views/admin/include/sidebar.php'; ?>
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
                <table id="tableAccount" class="table align-items-center mb-0 ">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Info</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ban</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data["users"] as $user): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $user -> fullname ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $user -> email ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?php if($user -> admin == 1): ?>
                          <p class="text-xs font-weight-bold mb-0">admin</p>
                        <?php else: ?>
                        <p class="text-xs text-secondary mb-0">normal</p>
                        <?php endif; ?>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $user ->  phone?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                        <?php if($user -> isBan == 1): ?>
                          <button class="btn btn-warning" id="btnUnLock" data-id = "<?= $user ->id ?>">UnLock</button>
                        <?php else: ?>
                          <button class="btn btn-danger" id="btnLock" data-id ="<?= $user ->id ?>">Lock</button>                        
                          <?php endif; ?>                  
                        </span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="remove user">
                          remove
                        </a>
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
      <script>
        $(document).ready(function() {
          $('#tableAccount').DataTable();
          $("#btnLock").on("click", function() {
            let id = $(this).attr("data-id") ;

              $('#btnLock').html('ĐANG XỬ LÝ').prop('disabled',true);
              Swal.fire({
                  title: 'Cảnh báo',
                  text: "Bạn có muốn khoá account này không?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Khoá'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          url: "<?= URLROOT ?>/auth/lockUser",
                          method: "POST",
                          data: {
                              id: id                
                          },
                          success: function(response) {
                              if(response.status === "success"){
                                  Swal.fire({
                                      title: 'Khoá thành công',
                                      text: response.message,
                                      icon: response.status,
                                  }).then((rs) => {
                                      if(rs.isConfirmed){
                                        location.reload()
                                      }else{
                                        location.reload()
                                      }
                                  })
                              }else{
                                  Swal.fire({
                                      title: 'Thất bại',
                                      text: response.message,
                                      icon: response.status,
                                  })
                                  $('#btnLock').html('Lock').prop('disabled', false);
                              }        
                          }
                      });
                  } else {
                      
                      $('#btnLock').html('Lock').prop('disabled', false);
                  }
              })

          });

          $("#btnUnLock").on("click", function() {
              $('#btnUnLock').html('ĐANG XỬ LÝ').prop('disabled',true);
              let id = $(this).attr("data-id") ;
              Swal.fire({
                  title: 'Cảnh báo',
                  text: "Bạn có muốn mở khoá account này không?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Mở Khoá'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          url: "<?= URLROOT ?>/auth/unLock",
                          method: "POST",
                          data: {
                              id: id                
                          },
                          success: function(response) {
                              if(response.status === "success"){
                                  Swal.fire({
                                      title: 'Mở Khoá thành công',
                                      text: response.message,
                                      icon: response.status,
                                  }).then((rs) => {
                                      if(rs.isConfirmed){
                                        location.reload()
                                      }else{
                                        location.reload()
                                      }
                                  })
                              }else{
                                  Swal.fire({
                                      title: 'Thất bại',
                                      text: response.message,
                                      icon: response.status,
                                  })
                                  $('#btnUnLock').html('Lock').prop('disabled', false);
                              }        
                          }
                      });
                  } else {
                      
                      $('#btnUnLock').html('Lock').prop('disabled', false);
                  }
              })

          });

      });
      </script>
<?php require_once APPROOT . '/src/views/admin/include/footer.php'; ?>