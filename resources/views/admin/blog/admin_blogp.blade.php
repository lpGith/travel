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
                <form action="{{asset('/admin_blogp')}}" method="get" class="form-inline">
                标题:<input type="text" class="form-control" name="name" size="12"/> 
  
                <input type="submit" class="btn btn-primary btn-xs" value="搜索"/>
                <a class="btn btn-success btn-xs" href="/admin_blogp">查看全部</a>
            </form>
                  <table class="table table-bordered">
                    <tr>
                      <th>帖子id</th>
                      <th>标题</th>
                      <th>图片</th>
                      <th>内容</th>
                      <th>发帖人id</th>
                      <th>访问量</th>
                      <th>点赞量</th>
                      <th>发帖时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $data)
                    <tr>
                      <td>{{ $data->post_id }}</td>
                      <td>{{ $data->post_title }}</td>
                      <td><img src="/blog_uploads/s_{{ $data->post_pic }}" width="100"></td>
                      <td>{{ $data->post_content }}</td>
                      <td>{{ $data->post_user_id }}</td>                  
                      <td>{{ $data->post_number }}</td>                  
                      <td>{{ $data->post_prise }}</td>                  
                      <td>{{ $data->post_time }}</td>  
					<td><button class="btn btn-xs-lg btn-danger" onclick="doDel({{ $data->post_id }})">删除</button>
                    </tr>
                    @endforeach
                  </table>
                  <center> {!! $list->appends($where)->render() !!}</center>
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
				window.location.href="/admin_delp/"+id;
				return true;
				}else{
					return false;
				}
          }
        </script>
        
    @endsection