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
            <li><a href="#">团购详情信息管理</a></li>
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
                <form class="form-horizontal" action="{{URL('/admin/goupiaodetailline')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">typeid</label>
                      <div class="col-sm-4">                        
						<select name="tuangoudetail_typeid" class="form-control" id="inputEmail3">
							@foreach($data as $yy)
								<option value="{{$yy->id}}">{{$yy->tuangou_name}}</option>
							@endforeach
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图1</label>
                      <div class="col-sm-4">
                        <input type="file" name="tuangoudetail_picname1" class="form-control" id="inputPassword3" placeholder="图1">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图2</label>
                      <div class="col-sm-4">
                        <input type="file" name="tuangoudetail_picname2" class="form-control" id="inputPassword3" placeholder="图2">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图3</label>
                      <div class="col-sm-4">
                        <input type="file" name="tuangoudetail_picname3" class="form-control" id="inputPassword3" placeholder="图3">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图4</label>
                      <div class="col-sm-4">
                        <input type="file" name="tuangoudetail_picname4" class="form-control" id="inputPassword3" placeholder="图4">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图5</label>
                      <div class="col-sm-4">
                        <input type="file" name="tuangoudetail_picname5" class="form-control" id="inputPassword3" placeholder="图5">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">产品特色</label>
                      <div class="col-sm-4">
                        <textarea type="text" name="tuangoudetail_tese" class="form-control" id="inputPassword3" placeholder="产品特色"></textarea>
                      </div>
                    </div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">行程安排</label>
							<div class="col-sm-8">
								 <textarea id="container" name="tuangoudetail_xingcheng" type="text/plain">
									这里写你的初始化内容
								</textarea>
							</div>
					</div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">费用说明</label>
                      <div class="col-sm-4">
                        <textarea type="text" name="tuangoudetail_feiyong" class="form-control" id="inputPassword3" placeholder="费用说明"></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				   <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn btn-sm btn-primary" value="修改">
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
	@include('UEditor::head');
	@section('bianji')
    
    <script type="text/javascript">
    var ue = UE.getEditor('container');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
	</script>
    @endsection
