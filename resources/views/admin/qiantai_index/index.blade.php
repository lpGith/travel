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
            <li><a href="#">购票信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 前台首页信息管理</h3></div>
			
				  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h2 class="btn  btn-info" id="exampleModalLabel"><b>前台首页信息修改表</b></h2></center>
					  </div>
					  <div class="modal-body">
						 <form  id="table_edit" class="form-horizontal" action="" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								  <div class="box-body">
									<div class="form-group">
									  <label for="inputEmail3" class="col-sm-2 control-label">景点类型</label>
										<div class="col-sm-4">
										 <select name="pid" class="form-control" id="inputEmail3">
											<option value="16">绝美风景</option>
											<option value="20">历史景观</option>
											<option value="47">文化艺术</option>
										</select>
										</div>
									</div>
									
									<div class="form-group">
									  <label for="inputPassword3" class="col-sm-2 control-label">景点类别名</label>
									  <div class="col-sm-4">
										 <select name="edit_title" class="form-control" id="inputEmail3">
											<option value="张家界绝美风景">张家界绝美风景</option>
											<option value="张家界历史景观">张家界历史景观</option>
											<option value="张家界文化艺术">张家界文化艺术</option>
										</select>
									  </div>
									</div>
									<div class="form-group">
									  <label for="inputPassword3" class="col-sm-2 control-label">景点描述</label>
									  <div class="col-sm-4">
										 <select name="edit_content" class="form-control" id="inputEmail3">
											<option value="岂有此理张家界，人间仙境任我行">岂有此理张家界，人间仙境任我行</option>
											<option value="嵩山深林古庸城，文化衣冠渐得名">嵩山深林古庸城，文化衣冠渐得名</option>
											<option value="红灯万盏人千叠，一片痴缠摆手歌">红灯万盏人千叠，一片痴缠摆手歌</option>
										</select>
										</div>
									</div>
								  </div><!-- /.box-body -->
								  <div class="box-footer">
									<div class="col-sm-offset-2 col-sm-2">
										<input type="submit" class="btn btn-sm btn-primary" value="修改">
									</div>
									<div class="col-sm-2">
										<input type="submit" class="btn btn-sm btn-primary" value="重置">
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
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>pid</th>
                      <th>景点类别名</th>
                      <th>景点描述</th>
                      <th style="width: 100px">操作</th>
                    </tr>                   
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->pid}}</td>
                        <td>{{$list->edit_title}}</td>
                        <td>{{$list->edit_content}}</td>  
                        <td>
                           <a href='#'><button class="edit btn btn-xs btn-primary"  data-content="{{json_encode($list)}}"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >编辑</button></a>
                        </td>
                    </tr>     
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
       <script type="text/javascript" src="{{asset('./goupiaos1/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript">
		var editContent;
            $(".edit").click(function(e){
                editContent = $(this).data('content');
                
                $("#exampleModal").on('shown.bs.modal',function(e){
                    $(this).find('#table_edit').attr('action',"indexdoedit");						
                    $("input[name='pid']").val(editContent.pid);
                    $("input[name='edit_title']").val(editContent.edit_title);
                    $("input[name='edit_content']").val(editContent.edit_content);                                  
                });
            });
		</script>
    @endsection