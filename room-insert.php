<?php
      session_start();
      require_once ("connect.php");
      include('headen.php');
      if(!isset($_SESSION['id'])){
        echo "Please Login!";
        exit();
      }
?>
<style>
input[type=text], input[select] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
</style>
<div class="col-lg-12 animated fadeInDown">
    <div class="row ibox-content">
      <form action="config-insert-room.php" method="POST">
        <div class="col-lg-12">
          <label>ข้อมูลห้อง</label>
        </div>
        <div class="col-lg-12">
            <label>ชื่อห้อง</label>
            <input type="text" class="form-control" name="name_room">
        </div>
        <div class="col-lg-12">
            <label>รหัสห้อง</label>
            <input type="text" class="form-control" name="code_room">
        </div>
        <div class="col-lg-12">
            <label>อาคาร</label>
            <input type="text" class="form-control" name="building_number">
        </div>
        <div class="col-lg-12">
        <label for="sel1">สถานะ:</label>
            <select class="form-control" name="status_room">
                <option value="0">ว่าง</option>
                <option value="1">ไม่ว่าง</option>
                <option value="2">ปรับปรุง</option>
            </select>
        </div>
        <div class="row">
        <div class="col-lg-6" style="margin-top: 30px; text-align:right;">
          <input type="submit" class="btn btn-success" value="เพิ่ม" >
        </div>
      </form>
        <div class="col-lg-6" style="margin-top: 30px; margin-bottom:30px;text-align:right;">
            <button type="button" class="btn btn-danger" onclick="location.href='room-control.php'">
                    กลับหน้าหลัก
            </button>
        </div>
        </div>

  </div>

</div>

<?php
    include 'footer.php';
?>