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
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 景点分类管理</h3></div>
		
				  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>类别修改表</b></h2></center>
					  </div>
						<div class="modal-body">
						 
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
						</div>
						</div>
					</div>
				</div>
				
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>   
                      <th>类别名称</th>
                      <th>父类id</th>
                      <th>分类路径</th>
                      <th style="width: 200px">操作</th>
                    </tr>                   
                      @foreach ($list as $xx)
                    <tr>
					<?php
						$m=substr_count($xx->path,",")-1;  //计算类别路径中“,”出现的次数
						$nbsp=str_repeat('&nbsp;',$m*10); 
					?>
                        <td>{{$xx->id}}</td>
                        <td>{{$nbsp}}|---->{{$xx->jingdian_name}}</td>
                        <td>{{$xx->pid}}</td>
                        <td>{{$xx->path}}</td>
                        <td>
                            <a href="/admin/jingdiantype1?id={{$xx->id}}"><button class="btn btn-xs btn-danger">添加子类别</button></a>
                            <a href="/admin/jingdiantype/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
                @endforeach                 
                  </table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
       
    @endsection