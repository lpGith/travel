
<!-- Content Header (Page header) -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h2 class="modal-title" id="exampleModalLabel"><b>购票项目添加表</b></h2></center>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{URL('/admin/goupiao')}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">购票项目</label>
                      <div class="col-sm-4">
                        <input type="text" name="goupiao_model" class="form-control" id="inputEmail3" placeholder="购票项目">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">种类1</label>
                      <div class="col-sm-4">
                        <input type="text" name="goupiao_style1" class="form-control" id="inputPassword3" placeholder="种类1">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">种类2</label>
                      <div class="col-sm-4">
                        <input type="text" name="goupiao_style2" class="form-control" id="inputPassword3" placeholder="种类2">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">种类3</label>
                      <div class="col-sm-4">
                        <input type="text" name="goupiao_style3" class="form-control" id="inputPassword3" placeholder="种类3">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">种类4</label>
                      <div class="col-sm-4">
                        <input type="text" name="goupiao_style4" class="form-control" id="inputPassword3" placeholder="种类4">
                      </div>
                    </div>				
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn btn-primary" value="添加">
                    </div>
					<div class="col-sm-1">
						<input type="submit" class="btn btn-primary" value="重置">
					</div>
                  </div><!-- /.box-footer -->
                </form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>
       
       
