<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_POST['btn_add'])) {

  $insertStaff = db_query("CALL edit_nv('" . $_GET["id"] . "', '" . $_POST["nv_name"] . "', '" . $_POST["nv_gender"] . "', '" . $_POST["nv_birth"] . "', '" . $_POST["nv_work"] . "', '" . $_POST["nv_address"] . "', '" . $_POST["nv_role"] . "', '" . $_POST["nv_phone"] . "', '" . $_POST["nv_pay"] . "' )");
  if ($insertStaff) {
    redirect("?page=staff&action=index");
  }
}

if (isset($_GET['id'])) {
  $row = db_fetch_array("CALL show_nhanvien_by_id('" . $_GET["id"] . "')");
}

?>
<?php get_header() ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cập nhật</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?page=staff&action=index">Quản lý nhân viên</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa nhân viên</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cập nhật thông tin nhân viên</h3>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="MSNV">Mã nhân viên</label>
                <input disabled type="text" name="MSNV" id="MSNV" class="form-control" value="<?= ($row['maNV']) ?>">
              </div>
              <div class="form-group">
                <label for="name">Tên nhân viên</label>
                <input type="text" name="nv_name" class="form-control" id="name" placeholder="Nhập tên nhân viên" value="<?= ($row['tenNV']) ?>">
              </div>
              <div class="form-group">
                <label for="gender">Giới tính</label>
                <select required class="form-control custom-select" name="nv_gender" id="role">
                  <option <?= $row['gioiTinh'] == "Nam" ? "selected" : "" ?> name="nv_gender" value="Nam">Nam</option>
                  <option <?= $row['gioiTinh'] == "Nữ" ? "selected" : "" ?> name="nv_gender" value="Nữ">Nữ</option>
                  <option <?= $row['gioiTinh'] == "Khác" ? "selected" : "" ?> name="nv_gender" value="Khác">Khác</option>
                </select>
              </div>
              <div class="form-group">
                <label for="birth">Ngày sinh</label>
                <input type="date" name="nv_birth" class="form-control" id="birth" placeholder="Nhập ngày sinh YYYY-MM-DD" value="<?= ($row['Ngaysinh']) ?>">
              </div>
              <div class="form-group">
                <label for="work">Ngày làm việc</label>
                <input type="date" name="nv_work" class="form-control" id="work" placeholder="Nhập ngày làm việc YYYY-MM-DD" value="<?= ($row['ngayLamviec']) ?>">

              </div>
              <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="nv_address" class="form-control" id="address" placeholder="Nhập ngày địa chỉ" value="<?= ($row['Diachi']) ?>">
              </div>
              <div class="form-group">
                <label for="role">Chức vụ</label>
                <select required class="form-control custom-select" name="nv_role" id="role">
                  <option <?= $row['Chucvu'] == "Chủ tịch" ? "selected" : "" ?> value="Chủ tịch">Chủ tịch</option>
                  <option <?= $row['Chucvu'] == "Giám đốc" ? "selected" : "" ?> value="Giám đốc">Giám đốc</option>
                  <option <?= $row['Chucvu'] == "Quản lý" ? "selected" : "" ?> value="Quản lý">Quản lý</option>
                  <option <?= $row['Chucvu'] == "Đầu bếp" ? "selected" : "" ?> value="Đầu bếp">Đầu bếp</option>
                  <option <?= $row['Chucvu'] == "Phục vụ" ? "selected" : "" ?> value="Phục vụ">Phục vụ</option>
                  <option <?= $row['Chucvu'] == "Thu ngân" ? "selected" : "" ?> value="Thu ngân">Thu ngân</option>
                  <option <?= $row['Chucvu'] == "Nhân viên kỹ thuật" ? "selected" : "" ?> value="Nhân viên kỹ thuật">Nhân viên kỹ thuật</option>
                </select>
              </div>
              <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="nv_phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="<?= ($row['sdt']) ?>">
              </div>
              <div class="form-group">
                <label for="pay">Lương</label>
                <input type="text" name="nv_pay" class="form-control" id="pay" placeholder="Nhập số lương" value="<?= ($row['luong']) ?>">
              </div>
              <div class=" row">
                <div class="col-12">
                  <a class="btn btn-secondary" href="?page=staff&action=index">
                    Hủy
                  </a>
                  <button name="btn_add" type="submit" class="btn btn-success float-right">Lưu</button>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

    </form>
  </section>
  <!-- /.content -->
</div>

<?php get_footer() ?>