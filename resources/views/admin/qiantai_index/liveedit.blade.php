@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			类别信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页生活控制表</a></li>
            <li><a href="#">生活信息</a></li>
            <li class="active">列表</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 前台首页生活信息修改</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				 <form class="form-horizontal" action="/admin/indexlive/{{ $xx->id }}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<input type="hidden" name="_method" value="put">
						  <div class="box-body">
							<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">主题名</label>
						  <div class="col-sm-4">
							<input type="text" name="live_name" value="{{$xx->live_name}}" class="form-control" id="inputPassword3" placeholder="主题名">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">图片</label>
						  <div class="col-sm-4">                        
							<input type="file" name="live_picname" class="form-control" id="inputPassword3" placeholder="图片">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">标题</label>
						  <div class="col-sm-4">
							<input type="text" name="live_title" value="{{$xx->live_title}}" class="form-control" id="inputPassword3" placeholder="标题">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
						  <div class="col-sm-4">
							<textarea type="text" name="live_content" class="form-control" id="inputPassword3" >{{$xx->live_content}}</textarea>
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">路径</label>
						  <div class="col-sm-4">
							<input type="text" name="live_href" value="{{$xx->live_href}}" class="form-control" id="inputPassword3" placeholder="路径" >
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