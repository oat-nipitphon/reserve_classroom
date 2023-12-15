<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ความคิดเห็น</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="config-add-comment.php" method="POST">
            <div class="row">
                <div class="col-lg-12" style="margin-left: auto; margin-right:auto;">
                    <p id="text-p-title">
                        <input type="hidden" value="<?php echo $name_room ?>" name="name_room">
                        <label>ห้อง :: <?php echo $name_room ?></label>
                        <label>วัน <?php echo date('d') ?> เดือน <?php echo date('M') ?> ปี <?php echo date('Y') ?></label>
                    </p>
                    <p id="text-p-title">
                        <label>ชื่อ :: <input type="text" name="name_user" value="<?php echo $name_user ?>"> </label>
                        <label>ประเภท :: 
                        <select name="comment_status">
                        <option value="<?php echo "หมายเหตุ / อื่น ๆ"?>">หมายเหตุ / อื่น ๆ</option>
                        <option value="<?php echo "ของหาย / ลืมของ"; ?>">ของหาย / ลืมของ</option>
                        </select>
                        </label>
                    </p>
                    <p id="text-p-content">
                        <textarea name="comment" id="" cols="90" rows="5"></textarea>
                    </p>
                    <p style="text-align: right;">
                        <button type="submit" class="btn btn-success">ส่ง</button>
                    </p>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>