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
            <li><a href="#">详情信息管理</a></li>
            <li class="active">修改图片信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改图片详情信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('/admin/goupiaodetailpic')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
                      <div class="col-sm-4">                        
						<select name="detailpic_typeid" class="form-control" id="inputEmail3">
							@foreach($data as $yy)
								<option value="{{$yy->id}}" {{($xx->detailpic_typeid=="{$yy->id}")?"selected":""}}>{{$yy->list_name}}</option>
							@endforeach
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
				    <div class="col-sm-offset-2 col-sm-2">
						<input type="submit" class="btn  btn-primary" value="修改">
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
	
 