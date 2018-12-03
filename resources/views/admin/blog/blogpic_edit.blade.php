@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->


    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">用户信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 添加图片</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				@foreach($pic_edit as $pics)
				@endforeach
                  <table class="table table-bordered">
				  <form action="/blogpic_doedit" method="post" class="form-inline" enctype="multipart/form-data">
				  <input type="hidden" name="_method" value="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="pic_id" value="{{ $pics->pic_id }}">
					<tr>
						<td align="right">图片标题:</td>
						<td><input type="text" name="pic_title" value="{{ $pics->pic_title }}" required></td>
					</tr>
					<tr>
						<td align="right">图片:</td>
						<td><input type="file" name="pic_path"></td>
					</tr>
					<tr>
						<td align="right"></td>
						<td>
							<button type="submit" class="btn btn-xs btn-primary">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
							<input type="reset" class="btn btn-xs btn-primary" value="重置">
						</td>
					</tr>
				  </form>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
    @endsection