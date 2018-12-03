@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			类别信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">类别图片信息管理</a></li>
            <li class="active">添加类别信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加图片信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('/admin/goupiao1')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">类别id</label>
                      <div class="col-sm-4">                        
						<select name="pic_typeid" class="form-control" id="inputEmail3">
							<option value="1">跟团游</option>
							<option value="2">门票</option>
							<option value="3">酒店</option>
							<option value="4">特产</option>
						</select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片描述</label>
                      <div class="col-sm-4">
                        <input type="text" name="pic_miaoshu" class="form-control" id="inputPassword3" placeholder="图片描述">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">活动优惠</label>
                      <div class="col-sm-4">
                        <input type="text" name="pic_huodong" class="form-control" id="inputPassword3" placeholder="活动优惠">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <input type="file" name="pic_picname" class="form-control" id="inputPassword3" placeholder="图片">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">价格</label>
                      <div class="col-sm-4">
                        <input type="text" name="pic_price" class="form-control" id="inputPassword3" placeholder="价格">
                      </div>
                    </div>
                    
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn btn-sm btn-primary" value="添加">
                    </div>
					<div class="col-sm-1">
						<input type="submit" class="btn btn-sm btn-primary" value="重置">
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
 