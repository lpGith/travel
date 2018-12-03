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
                  <h3 class="box-title"><i class="fa fa-th"></i> 用户信息管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="{{asset('/admin_links')}}" method="get" class="form-inline">
                标题:<input type="text" class="form-control" name="name" size="12"/> 
  
                <input type="submit" class="btn btn-primary btn-xs" value="搜索"/>
                <a href="/admin_linkadd">添加链接</a>
            </form>
                  <table class="table table-bordered">
				  <th>添加链接</th>
				  <form action="/link_doadd" method="post" class="form-inline">
				  <input type="hidden" name="_method" value="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<tr>
						<td align="right">链接名称:</td>
						<td><input type="text" name="link_name" required></td>
					</tr>
					<tr>
						<td align="right">链接标题:</td>
						<td><input type="text" name="link_title" required></td>
					</tr>
					<tr>
						<td align="right">链接地址:</td>
						<td><input type="text" name="link_url" required></td>
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