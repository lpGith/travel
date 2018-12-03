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
            <li><a href="#">跟团游购票图片信息</a></li>
            <li class="active">详情页</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                 <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 跟团游购票详情信息管理</h3></div>
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><a href="{{URL('/admin/goupiaodetailline/create')}}"><button type="button" class="btn btn-flat btn-warning">添加跟团游购票信息</button></a></div>	  
                </div><!-- /.box-header -->
				<form action="/admin/goupiaodetailline" method="get" class="form-inline">
					行程安排:<input type="text" class="form-control" name="tuangoudetail_xingcheng" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/goupiaodetailline'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>typeid</th>
                      <th>图1</th>
                      <th>图2</th>
                      <th>图3</th>
                      <th>图4</th>                      
                      <th>图5</th>
                      <th>产品特色</th>
                      <th>行程安排</th>                    
                      <th>费用说明</th>                    
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($data as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->tuangoudetail_typeid}}</td>
						<td><img src="/admins/uploads/s_{{$xx->tuangoudetail_picname1}}"></td>
                        <td><img src="/admins/uploads/s_{{$xx->tuangoudetail_picname2}}"/></td>
                        <td><img src="/admins/uploads/s_{{$xx->tuangoudetail_picname3}}"/></td>
                        <td><img src="/admins/uploads/s_{{$xx->tuangoudetail_picname4}}"/></td>
                        <td><img src="/admins/uploads/s_{{$xx->tuangoudetail_picname5}}"/></td>                      
                        <td title="{{$xx->tuangoudetail_tese}}">{{mb_strcut($xx->tuangoudetail_tese,0,10)}}...</td>
                        <td title="{{$xx->tuangoudetail_xingcheng}}">{{mb_strcut($xx->tuangoudetail_xingcheng,0,10)}}...</td>                       
                        <td title="{{$xx->tuangoudetail_feiyong}}">{{mb_strcut($xx->tuangoudetail_feiyong,0,10)}}...</td>                                  
                        <td>
                            <a href="/admin/y_delete8?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href="/admin/goupiaodetailline/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
					@endforeach  
                  </table>
				   {!! $data->appends($where)->render() !!}
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
	
 