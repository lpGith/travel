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
                  <h3 class="box-title"><i class="fa fa-th"></i>论坛图片轮播管理</h3>
				  <h2><a href="/blogpic_add">添加图片</a></h2>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>图片id</th>
                      <th>标题</th>
                      <th>图片</th>
                      <th>添加时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $data)
                    <tr>
                      <td>{{ $data->pic_id }}</td>
                      <td>{{ $data->pic_title }}</td>
                      <td><img src="/blogpic_uploads/s_{{ $data->pic_path }}" width="100"></td>
                      <td>{{ $data->pic_time }}</td>
					<td>
						<button class="btn btn-xs btn-danger" onclick="doDel({{ $data->pic_id }})">删除</button> 
                      <a href='/blogpic_edit/{{ $data->pic_id }}'><button class="btn btn-xs btn-primary">编辑</button></a>
					</td>
                    </tr>
                    @endforeach
                  </table>
                  <center> {!! $list->render() !!}</center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        <form action="/admin" method="post" name="myform" style="display:none;">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="_method" value="delete" />
        </form>
        <script type="text/javascript">
          function doDel(id){
			if(confirm("确认要删除？")){
				window.location.href="/blog_delpic/"+id;
				return true;
				}else{
					return false;
				}
          }
        </script>
        
    @endsection