@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页轮播控制表</a></li>
            <li><a href="#">轮播信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 前台首页轮播图片信息管理</h3></div>
			
				  <!-- 添加表单 -->
				  <div class="col-sm-3"><i class="fa fa-fw fa-plus-square"></i><button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加购票项目信息</button></div>
				
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>前台首页轮播图片添加表</b></h2></center>
					  </div>
					  <div class="modal-body">
				  <form class="form-horizontal" action="{{URL('/admin/indexlunboadd')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">轮播图片</label>
						  <div class="col-sm-4">                        
							<input type="file" name="lunbo_picname" class="form-control" id="inputPassword3" placeholder="轮播图片">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">轮播文字</label>
						  <div class="col-sm-4">
							<input type="text" name="lunbo_wenzi" class="form-control" id="inputPassword3" placeholder="轮播文字">
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
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>前台首页轮播图片修改表</b></h2></center>
					  </div>
					  <div class="modal-body">
				  <form  id="table_edit" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">轮播图片</label>
						  <div class="col-sm-4">                        
							<input type="file" name="lunbo_picname" class="form-control" id="inputPassword3" placeholder="景区名">
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">轮播文字</label>
						  <div class="col-sm-4">
							<input type="text" name="lunbo_wenzi" class="form-control" id="inputPassword3" placeholder="轮播文字">
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
				
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>轮播图片</th>
                      <th>轮播文字</th> 
                      <th style="width: 100px">操作</th>
                    </tr> 
					@foreach ($list as $xx)					
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td><img src="/admins/uploads/s_{{$xx->lunbo_picname}}"></td>
                        <td>{{$xx->lunbo_wenzi}}</td>
                        <td>
						   <a href="#"><button class="btn btn-xs btn-danger" onclick="doDel({{ $xx->id }})">删除</button></a>
                           <a href='#'><button class="lunbo_edit btn btn-xs btn-primary"  data-content="{{json_encode($xx)}}"  data-toggle="modal" data-target="#exampleModal-edit" data-whatever="@mdo" >编辑</button></a>
                        </td>
                    </tr>
					@endforeach	
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
		  <form action="" method="get" name="myform" style="display:none;">
		  </form>
       <script type="text/javascript" src="{{asset('./goupiaos1/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript">
		var editContent;
            $(".lunbo_edit").click(function(e){
                editContent = $(this).data('content');
				//alert(editContent);
                $("#exampleModal-edit").on('shown.bs.modal',function(e){
                    $(this).find('#table_edit').attr('action',"indexlunboedit"+"/"+editContent.id);						
                    $("input[name='lunbo_wenzi']").val(editContent.lunbo_wenzi); 
						//alert("aa");
                })
            });
		function doDel(id){
            Modal.confirm({msg:"是否删除信息?"}).on(function(e){
              if(e){
                var form = document.myform;
                form.action = "{{URL('./admin/indexlunbodelete')}}/"+id;
                form.submit();
              }
            });
          }	
		</script>
    @endsection