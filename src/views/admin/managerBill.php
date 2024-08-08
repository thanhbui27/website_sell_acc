<?php 
$title = "Quản lý Billing";
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Loại game</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Server</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thời gian mua</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data["billing"] as $bill): ?>
                    <tr style="border-bottom: #efefef;">
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $bill -> id ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $bill -> username ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $bill -> amount ?></p>
                      </td>
                      <td class="align-middle text-center">
                      <p class="text-xs font-weight-bold mb-0"><?= $bill -> cate_game ?></p>
                      </td>
                      <td class="align-middle text-center">
                      <p class="text-xs font-weight-bold mb-0"><?= $bill -> name_server ?></p>
                      </td>
                      <td class="align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?= $bill -> order_date ?></p>
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
      });
      </script>
<?php require_once APPROOT . '/src/views/admin/include/footer.php'; ?>