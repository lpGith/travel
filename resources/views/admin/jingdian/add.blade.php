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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加类别信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				<form class="form-horizontal" action="{{URL('/admin/jingdiantype')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="pid" value="0">
				<input type="hidden" name="path" value="0,">
                  <div class="box-body">
					<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">父别名：根类名</label>
                      <label for="inputPassword3" class="col-sm-2 control-label">类别添加</label>
                      <div class="col-sm-4">
                        <input type="text" name="jingdian_name" class="form-control" id="inputPassword3" placeholder="类别添加">
                      </div>
                    </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-2">
						<input type="submit" class="btn  btn-primary" value="添加">
					</div>
					<div class="col-sm-2">
						<input type="submit" class="btn  btn-primary" value="重置">
					</div>
                  </div><!-- /.box-footer -->
                </form>
			
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
 