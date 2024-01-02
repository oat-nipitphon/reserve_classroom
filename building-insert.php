<?php
      session_start();
      require_once ("connect.php");
      include('layouts/headen.php');
      if(!isset($_SESSION['id'])){
        echo "Please Login!";
        exit();
      }
?>
<div class="row animated bounceInRight">
    <div class="ibox-title">
        <div class="col-md text-left">
            <label for=""><h2>กรอกข้อมูล</h2></label>
        </div>
    </div>
    <div class="ibox-content">
        <!-- <form method="POST" id="formInsertbuilding" class="form-horizontal"> -->
        <div class="form-groun ibox-form-insert">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-right">
                <label for="">ชื่ออาคารภาษาไทย</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" id="name_th" name="name_th">
                </div>
            </div>
            </div>
        </div>
        <div class="form-groun ibox-form-insert">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-right">
                <label for="">ชื่ออาคารภาษาอังกฤษ</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" id="name_en" name="name_en">
                </div>
            </div>
            </div>
        </div>
        <div class="form-groun ibox-form-insert">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-right">
                <label for="">สาขาวิชา</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" id="branch" name="branch">
                </div>
            </div>
            </div>
        </div>
        <div class="form-groun ibox-form-insert">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-right">
                <label for="">คณะ</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" id="board" name="board">
                </div>
            </div>
            </div>
        </div>
        <div class="form-groun ibox-form-insert">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success" onclick="insertBuilding()">บันทึกข้อมูล</button>
            </div>
        </div>
        <!-- </form> -->
        <div class="row">
        <div style="margin-top: 30px;" class="text-right">
            <button type="submit" class="btn btn-danger" onclick="location.href='building-control.php'">กลับ</button>
        </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">

      function insertBuilding(button){
        // url config-insert-building.php
        var = name_en = $('#name_en').val();
        console.log(name_en);
      }

</script>
<?php
    include 'layouts/footer.php';
?>
