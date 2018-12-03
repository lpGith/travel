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
            <li><a href="#">酒店详情信息管理</a></li>
            <li class="active">添加详情信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加详情信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('/admin/goupiaodetailhotel')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
                      <div class="col-sm-4">                        
						<select name="jiugoudetail_typeid" class="form-control" id="inputEmail3">
							<option value="1">张家界国际大酒店</option>
							<option value="2">张家界阳光酒店</option>
							<option value="3">张家界大成山水国际大酒店</option>
							<option value="4">张家界通达国际酒店</option>
							<option value="5">张家界蓝天大酒店</option>
							<option value="6">张家界闽南国际酒店</option>
							<option value="7">张家界紫御大酒店</option>
							<option value="8">张家界京武铂尔曼酒店</option>
							<option value="9">张家界京溪国际酒店</option>
						</select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">早餐</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugoudetail_zaocan" class="form-control" id="inputPassword3" placeholder="早餐">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">宽带</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugoudetail_kuandai" class="form-control" id="inputPassword3" placeholder="宽带">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">政策</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugoudetail_zhengce" class="form-control" id="inputPassword3" placeholder="政策">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">介绍</label>
                      <div class="col-sm-4">
                        <textarea type="file" name="jiugoudetail_jieshao" class="form-control" id="inputPassword3" placeholder="介绍"></textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">设施</label>
                      <div class="col-sm-4">
                        <textarea type="text" name="jiugoudetail_sheshi" class="form-control" id="inputPassword3" placeholder="设施"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图1</label>
                      <div class="col-sm-4">
                        <input type="file" name="jiugoudetail_picname1" class="form-control" id="inputPassword3" placeholder="图1">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图2</label>
                      <div class="col-sm-4">
                        <input type="file" name="jiugoudetail_picname2" class="form-control" id="inputPassword3" placeholder="图2">
                      </div>
                    </div>				
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn btn-primary">
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
