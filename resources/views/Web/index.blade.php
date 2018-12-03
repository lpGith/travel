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
                <form action="{{asset('/Web')}}" method="get" class="form-inline">
                标题:<input type="text" class="form-control" name="name" size="12"/> 
  
                <input type="submit" class="btn btn-primary" value="搜索"/>
            </form>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id</th>
                      <th>账号</th>
                      <th>昵称</th>
                      <th>密码</th>
                      <th>性别</th>
                      <th>地址</th>
                      <th>邮编</th>
                      <th>手机号</th>
                      <th>邮箱</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $data)
                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->username }}</td>
                      <td>{{ $data->name }}</td>
                      <td>******</td>
                      <td>{{($data->sex=="1")?"男":"女"}}</td>
                      <td>{{ $data->address }}</td>
                      <td>{{ $data->code }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ ($data->state=="1")?"高富帅":"屌丝" }}</td>
                      <td>{{ date("Y-m-d H:i:s",$data->addtime) }}</td>
                      <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $data->id }})">删除</button>
                      <a href='{{asset("aa")}}/{{ $data->id }}/edit'><button class="btn btn-xs btn-primary">编辑</button></a> </td>
                    </tr>
                    @endforeach
                  </table>
                  {!! $list->appends($where)->render() !!}
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        <form action="/Web" method="post" name="myform" style="display:none;">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="_method" value="delete" />
        </form>
        <script type="text/javascript">
          function doDel(id){
            Modal.confirm({msg:"是否删除信息?"}).on(function(e){
              if(e){
                var form = document.myform;
                form.action = "{{URL('./Web')}}/"+id;
                form.submit();
              }
            })
          }
        </script>
@endsection 