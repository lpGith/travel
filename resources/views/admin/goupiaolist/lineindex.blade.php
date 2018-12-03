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
            <li><a href="#">购票图片信息</a></li>
            <li class="active">跟团游列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 购票图片信息管理</h3></div>
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>跟团游订票列表添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" action="{{URL('/admin/goupiaolistline')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							  <div class="box-body">
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-2 control-label">团游名</label>
								  <div class="col-sm-4">                        
									<input type="text" name="tuangou_name" class="form-control" id="inputPassword3" placeholder="团游名">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">产品编号</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_bianhao" class="form-control" id="inputPassword3" placeholder="产品编号">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">出发地</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_chufa" class="form-control" id="inputPassword3" placeholder="出发地">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">目的地</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_mudi" class="form-control" id="inputPassword3" placeholder="目的地">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">行程概要</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_gaiyao" class="form-control" id="inputPassword3" placeholder="行程概要">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
								  <div class="col-sm-4">
									<input type="file" name="tuangou_picname" class="form-control" id="inputPassword3" placeholder="图片">
								  </div>
								</div>
							   
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">成人价格</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_price1" class="form-control" id="inputPassword3" placeholder="成人价格">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">儿童价</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_price2" class="form-control" id="inputPassword3" placeholder="儿童价">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">产品经理推荐</label>
								  <div class="col-sm-4">
									<input type="text" name="tuangou_tuijian" class="form-control" id="inputPassword3" placeholder="产品经理推荐">
								  </div>
								</div>
							  </div><!-- /.box-body -->
							  <div class="box-footer">
								<div class="col-sm-offset-2 col-sm-2">
									<input type="submit" class="btn  btn-primary" value="添加">
								</div>
								<div class="col-sm-2">
									<input type="submit" class="btn  btn-primary" value="重置">
								</div>
							  </div><!-- /.box-footer -->
							</form>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
							</div>
						</div>
					</div>
				</div>
                </div><!-- /.box-header -->
				 <form action="/admin/goupiaolistline" method="get" class="form-inline">
					产品编号:<input type="text" class="form-control" name="tuangou_bianhao" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/goupiaolistline'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>团游名</th>
                      <th>产品编号</th>
                      <th>出发地</th>
                      <th>目的地</th>                      
                      <th>行程概要</th>
                      <th>图片</th>
                      <th>成人价格</th>
                      <th>儿童价</th>
                      <th>产品经理推荐</th>
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($list as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->tuangou_name}}</td>
                        <td>{{$xx->tuangou_bianhao}}</td>
                        <td>{{$xx->tuangou_chufa}}</td>
                        <td>{{$xx->tuangou_mudi}}</td>
                        <td title="{{$xx->tuangou_gaiyao}}">{{mb_strcut($xx->tuangou_gaiyao,0,10)}}...</td>
                        <td><img src="/admins/uploads/s_{{$xx->tuangou_picname}}"/></td>
                        <td>{{$xx->tuangou_price1}}</td>                      
                        <td>{{$xx->tuangou_price2}}</td>                      
                        <td title="{{$xx->tuangou_tuijian}}">{{mb_strcut($xx->tuangou_tuijian,0,10)}}...</td>                                                               
                        <td>
                            <a href="/admin/y_delete7?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href="/admin/goupiaolistline/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
                        </td>
                    </tr>
					@endforeach  
                  </table>
				   {!! $list->appends($where)->render() !!}
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
 