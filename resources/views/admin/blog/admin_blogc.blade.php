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
                <form action="{{asset('/admin_blogc')}}" method="get" class="form-inline">
                评论内容：<input type="text" class="form-control" name="name" size="12"/> 
  
                <input type="submit" class="btn btn-primary btn-xs" value="搜索"/>
                <a class="btn btn-success btn-xs" href="/admin_blogc">查看全部</a>
            </form>
                  <table class="table table-bordered">
                    <tr>
                      <th>评论id</th>
                      <th>发帖人id</th>
                      <th>评论人id</th>
                      <th>帖子id</th>
                      <th>评论时间</th>
                      <th>评论内容</th>
                      <th>操作</th>
                    </tr>
                    @foreach($list as $data)
                    <tr>
                      <td>{{ $data->comment_id }}</td>
                      <td>{{ $data->comment_uid }}</td>
                      <td>{{ $data->comment_cid }}</td>
                      <td>{{ $data->comment_pid }}</td>                  
                      <td>{{ $data->comment_time }}</td>                  
                      <td>{{ $data->comment_content }}</td>  
					<td><button class="btn btn-xs-lg btn-danger" onclick="doDel({{ $data->comment_id }})">删除</button>
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
				window.location.href="/admin_delc/"+id;
				return true;
				}else{
					return false;
				}
          }
        </script>
        
    @endsection