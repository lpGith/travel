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
            <li><a href="#">列表信息管理</a></li>
            <li class="active">添加列表信息</li>
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
                <form class="form-horizontal" action="{{URL('/admin/goupiaodetailpic')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
                      <div class="col-sm-4">                        
						<select name="detailpic_typeid" class="form-control" id="inputEmail3">
							<option value="1">天门山国家森林公园</option>
							<option value="2">黄石寨索道(单程）</option>
							<option value="3">黄龙洞</option>
							<option value="4">宝峰湖</option>
							<option value="5">土家风情园（土司城）</option>
							<option value="6">杨家界索道（单程）</option>
							<option value="7">张家界大峡谷</option>
							<option value="8">百龙天梯</option>
						</select>
                      </div>
                    </div>         
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图1</label>
                      <div class="col-sm-4">
                        <input type="file" name="detailpic_picname1" class="form-control" id="inputPassword3" placeholder="图1">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图2</label>
                      <div class="col-sm-4">
                        <input type="file" name="detailpic_picname2" class="form-control" id="inputPassword3" placeholder="图2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图3</label>
                      <div class="col-sm-4">
                        <input type="file" name="detailpic_picname3" class="form-control" id="inputPassword3" placeholder="图3">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图4</label>
                      <div class="col-sm-4">
                        <input type="file" name="detailpic_picname4" class="form-control" id="inputPassword3" placeholder="图4">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图5</label>
                      <div class="col-sm-4">
                        <input type="file" name="detailpic_picname5" class="form-control" id="inputPassword3" placeholder="图5">
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
	
 