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
            <li><a href="#">景点分类</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 景点详情管理</h3></div>
				 <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>景点详情页添加表</b></h2></center>
					  </div>
						<div class="modal-body">
						 <center><p>本功能尚未开通</p></center>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
						</div>
						</div>
					</div>
				</div>
				
                </div><!-- /.box-header -->
				 <form action="/admin/jingdiandetail" method="get" class="form-inline">
					景点名:<input type="text" class="form-control" name="jingdian_tuming" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/jingdiandetail'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th> 
					  <th>类别id</th>
                      <th>景点名</th>
                      <th>图片</th>
                      <th>景点详情</th>
                      <th style="width: 200px">操作</th>
                    </tr>                   
                      @foreach ($list as $xx)
                    <tr>					
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->jingdian_typeid}}</td>
                        <td>{{$xx->jingdian_tuming}}</td>
                        <td><img src="/admins/uploads/s_{{$xx->jingdian_picname}}"></td>
                        <td title="{{$xx->jingdian_detail}}">{{mb_strcut($xx->jingdian_detail,0,10)}}...</td>
                        <td>
                            <a href="/admin/y_delete10?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href="/admin/jingdiandetail/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
                @endforeach                 
                  </table>
				  {!! $list->render() !!}
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
       
    @endsection