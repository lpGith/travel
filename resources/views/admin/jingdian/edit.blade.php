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
            <li class="active">修改详情信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改详情信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				 <form class="form-horizontal" action="/admin/jingdiantype/{{ $xx->id }}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<input type="hidden" name="_method" value="put">
						  <div class="box-body">
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">类别名称</label>
							  <div class="col-sm-4">
								<input type="text" name="jingdian_name" value="{{$xx->jingdian_name}}" class="form-control" id="inputEmail3" placeholder="购票项目">
							  </div>
							</div>
										
						  </div><!-- /.box-body -->
						  <div class="box-footer">
							<div class="col-sm-offset-2 col-sm-1">
								<input type="submit" class="btn btn-primary" value="修改">
							</div>
							<div class="col-sm-1">
								<input type="submit" class="btn btn-primary" value="重置">
							</div>
						  </div><!-- /.box-footer -->
						</form>
	
					<div class="row"><div class="col-sm-12">&nbsp;</div></div>
						  </div><!-- /.box -->
				   
						</div><!--/.col (right) -->
					  </div>   <!-- /.row -->
					</section><!-- /.content -->
					
				@endsection