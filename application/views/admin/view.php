<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style=" margin-left: 35%;" class="page-header">Dashboard</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-2">
</div>
            <div class="col-lg-8" style="border: 1px solid #e1e6ef;">
<form>
  <div class="form-group">
  <?php
  foreach($views as $v)
  {
  ?>
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" value="<?=$v['user_email'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <?php } ?>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  
  <div class="form-group">
    <button class="btn btn-primary" > save</button>
  </div>
</form>
</div>
</div>
</div>