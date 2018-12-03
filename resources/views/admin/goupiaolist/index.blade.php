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
				  <!-- 添加表单 -->
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>购票列表页添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
				  <form class="form-horizontal" action="{{URL('/admin/goupiaolist')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">景区名</label>
						  <div class="col-sm-4">                        
							<input type="text" name="list_name" class="form-control" id="inputPassword3" placeholder="景区名">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
						  <div class="col-sm-4">
							<input type="text" name="list_address" class="form-control" id="inputPassword3" placeholder="地址">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
						  <div class="col-sm-4">
							<input type="text" name="list_jianjie" class="form-control" id="inputPassword3" placeholder="简介">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">评级</label>
						  <div class="col-sm-4">
							<input type="text" name="list_pingji" class="form-control" id="inputPassword3" placeholder="评级">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
						  <div class="col-sm-4">
							<input type="file" name="list_picname" class="form-control" id="inputPassword3" placeholder="图片">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">票种</label>
						  <div class="col-sm-4">
							<input type="text" name="list_piaozhong" class="form-control" id="inputPassword3" placeholder="票种">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">市场价</label>
						  <div class="col-sm-4">
							<input type="text" name="list_shichangprice" class="form-control" id="inputPassword3" placeholder="市场价">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">优惠价</label>
						  <div class="col-sm-4">
							<input type="text" name="list_youhuiprice" class="form-control" id="inputPassword3" placeholder="优惠价">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">兑换方式</label>
						  <div class="col-sm-4">
							<input type="text" name="list_style" class="form-control" id="inputPassword3" placeholder="兑换方式">
						  </div>
						</div>
					  </div>
					  <div class="box-footer">
					   <div class="col-sm-offset-2 col-sm-2">
							<input type="submit" class="btn  btn-primary" value="添加">
						</div>
						<div class="col-sm-2">
							<input type="submit" class="btn  btn-primary" value="重置">
						</div>
					  </div>
					</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
					</div>
					</div>
					</div>
				</div>
				<!-- 添加表单结束 -->
				<!-- 修改表单start -->
				<div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>购票列表页修改表</b></h2></center>
					  </div>
					  <div class="modal-body">
				  <form  id="table_edit" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<input type="hidden" name="_method" value="put">
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">景区名</label>
						  <div class="col-sm-4">                        
							<input type="text" name="list_name" class="form-control" id="inputPassword3" placeholder="景区名">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
						  <div class="col-sm-4">
							<input type="text" name="list_address" class="form-control" id="inputPassword3" placeholder="地址">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
						  <div class="col-sm-4">
							<input type="text" name="list_jianjie" class="form-control" id="inputPassword3" placeholder="简介">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">评级</label>
						  <div class="col-sm-4">
							<input type="text" name="list_pingji" class="form-control" id="inputPassword3" placeholder="评级">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
						  <div class="col-sm-4">
							<input type="file" name="list_picname" class="form-control" id="inputPassword3" placeholder="图片">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">票种</label>
						  <div class="col-sm-4">
							<input type="text" name="list_piaozhong" class="form-control" id="inputPassword3" placeholder="票种">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">市场价</label>
						  <div class="col-sm-4">
							<input type="text" name="list_shichangprice" class="form-control" id="inputPassword3" placeholder="市场价">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">优惠价</label>
						  <div class="col-sm-4">
							<input type="text" name="list_youhuiprice" class="form-control" id="inputPassword3" placeholder="优惠价">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">兑换方式</label>
						  <div class="col-sm-4">
							<input type="text" name="list_style" class="form-control" id="inputPassword3" placeholder="兑换方式">
						  </div>
						</div>
					  </div>
					  <div class="box-footer">
					   <div class="col-sm-offset-2 col-sm-2">
							<input type="submit" class="btn  btn-primary" value="修改">
						</div>
						<div class="col-sm-2">
							<input type="submit" class="btn  btn-primary" value="重置">
						</div>
					  </div>
					</form>
					</div>
					<div class="modal-footer">
						<button id="button_edit" type="button" class="btn btn-flat btn-danger" data-dismiss="modal">关闭</button>
					</div>
					</div>
					</div>
				</div>
				<!-- 修改表单结束     -->
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>景区名</th>
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
                        <td>{{$xx->list_name}}</td>
                        <td>{{$xx->list_address}}</td>
                        <td>{{$xx->list_jianjie}}</td>
                        <td>{{$xx->list_pingji}}</td>
                        <td><img src="/admins/uploads/s_{{$xx->list_picname}}"/></td>
                        <td>{{$xx->list_piaozhong}}</td>                      
                        <td>{{$xx->list_shichangprice}}</td>                      
                        <td>{{$xx->list_youhuiprice}}</td>                      
                        <td>{{$xx->list_style}}</td>                      
                        <td>
                           <a href="/admin/y_delete3?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                            <a href='#'><button class="zhu-edit btn btn-xs btn-primary"  data-content="{{json_encode($xx)}}"  data-toggle="modal" data-target="#exampleModal-edit" data-whatever="@mdo" >编辑</button></a>
                        </td>
                    </tr>
					@endforeach  
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        <script type="text/javascript" src="{{asset('./goupiaos1/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript">
		var editContent;
            $(".zhu-edit").click(function(e){
                editContent = $(this).data('content');
                
                $("#exampleModal-edit").on('shown.bs.modal',function(e){
                    $(this).find('#table_edit').attr('action','goupiaolist/' + editContent.id);						
                    $("input[name='list_name']").val(editContent.list_name);
                    $("input[name='list_address']").val(editContent.list_address);
                    $("input[name='list_jianjie']").val(editContent.list_jianjie);                   
                    $("input[name='list_pingji']").val(editContent.list_pingji);                   
                    $("input[name='list_piaozhong']").val(editContent.list_piaozhong);                   
                    $("input[name='list_shichangprice']").val(editContent.list_shichangprice);                   
                    $("input[name='list_youhuiprice']").val(editContent.list_youhuiprice);                   
                    $("input[name='list_style']").val(editContent.list_style);                   
                })
            });
			$("#button_edit").click(function(){
                    $(this).find('#table_edit').attr('action',"");						
                    $("input[name='list_name']").val(null);
                    $("input[name='list_address']").val(null);
                    $("input[name='list_jianjie']").val(null);                 
                    $("input[name='list_pingji']").val(null);                  
                    $("input[name='list_piaozhong']").val(null);                  
                    $("input[name='list_shichangprice']").val(null);                   
                    $("input[name='list_youhuiprice']").val(null);                  
                    $("input[name='list_style']").val(null);                   
                
            });
			
		</script>
    @endsection
	
	
 