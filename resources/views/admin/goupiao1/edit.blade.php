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
            <li class="active">修改类别信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改图片信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/admin/goupiao1/{{$xx->id}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">类别id</label>
                      <div class="col-sm-4">                        
						 <input type="text" name="pic_typeid" readonly class="form-control" value="{{$xx->pic_typeid}}" id="inputPassword3" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">活动名称</label>
                      <div class="col-sm-4">                        
						<select name="pic_miaoshu" class="form-control" id="inputEmail3">		
							@foreach($model as $mm)
								<option value="{{$mm->id}}">	
								{{($xx->pic_typeid==1)?"$mm->tuangou_name":(($xx->pic_typeid==2)?"$mm->list_name":"$mm->jiugou_name")}}
								</option>
							@endforeach
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">活动优惠</label>
                      <div class="col-sm-4">
                        <input type="text" name="pic_huodong" value="{{ $xx->pic_huodong}}" class="form-control" id="inputPassword3">
                      </div>
                    </div>	
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <input type="file" name="pic_picname" class="form-control" id="inputPassword3" >
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">价格</label>
                      <div class="col-sm-4">
                        <input type="text" name="pic_price" value="{{ $xx->pic_price}}" class="form-control" id="inputPassword3" placeholder="价格">
                      </div>
                    </div>
                    
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-2">
						<input type="submit" class="btn btn-sm btn-primary" value="修改">
                    </div>
					<div class="col-sm-2">
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
	
 