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
            <li class="active">列表</li>
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
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>酒店订票列表添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
						  <form class="form-horizontal" action="{{URL('/admin/goupiaolisthotel')}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							  <div class="box-body">
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-2 control-label">酒店名</label>
								  <div class="col-sm-4">                        
									<input type="text" name="jiugou_name" class="form-control" id="inputPassword3" placeholder="酒店名">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_address" class="form-control" id="inputPassword3" placeholder="地址">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
								  <div class="col-sm-4">
									<textarea type="text" name="jiugou_jianjie" class="form-control" id="inputPassword3" placeholder="简介"></textarea>
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">评级</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_pingji" class="form-control" id="inputPassword3" placeholder="评级">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
								  <div class="col-sm-4">
									<input type="file" name="jiugou_picname" class="form-control" id="inputPassword3" placeholder="图片">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">票种</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_piaozhong" class="form-control" id="inputPassword3" placeholder="票种">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">市场价</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_price1" class="form-control" id="inputPassword3" placeholder="市场价">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">优惠价</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_price2" class="form-control" id="inputPassword3" placeholder="优惠价">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputPassword3" class="col-sm-2 control-label">兑换方式</label>
								  <div class="col-sm-4">
									<input type="text" name="jiugou_pay" class="form-control" id="inputPassword3" placeholder="兑换方式">
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
				 <form action="/admin/goupiaolisthotel" method="get" class="form-inline">
					酒店星级:<input type="text" class="form-control" name="jiugou_pingji" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/goupiaolisthotel'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>酒店名</th>
                      <th>地址</th>
                      <th>简介</th>
                      <th>评级</th>                      
                      <th>图片</th>
                      <th>票种</th>
                      <th>市场价</th>
                      <th>优惠价</th>
                      <th>兑换方式</th>
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($list as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->jiugou_name}}</td>
                        <td>{{$xx->jiugou_address}}</td>
                        <td title="{{$xx->jiugou_jianjie}}">{{mb_strcut($xx->jiugou_jianjie,0,10)}}...</td>
                        <td>{{$xx->jiugou_pingji}}</td>
                        <td><img src="/admins/uploads/s_{{$xx->jiugou_picname}}"/></td>
                        <td>{{$xx->jiugou_piaozhong}}</td>                      
                        <td>{{$xx->jiugou_price1}}</td>                      
                        <td>{{$xx->jiugou_price2}}</td>                      
                        <td>{{$xx->jiugou_pay}}</td>                      
                        <td>
                            <a href="/admin/y_delete5?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href="/admin/goupiaolisthotel/{{$xx->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button></a>
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
	
	
 