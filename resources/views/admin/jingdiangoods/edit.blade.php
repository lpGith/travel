@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			类别信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">团购详情信息管理</a></li>
            <li class="active">修改详情信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改详情信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
					
			<form class="form-horizontal" action="/admin/jingdiandetail/{{$xx->id}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="_method" value="put">
                  <div class="box-body">
                   <div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">类别typeid</label>
					  <div class="col-sm-4">                        
						<select name="jingdian_typeid" class="form-control" id="inputEmail3">
							@foreach($list as $yy)
							<?php
							$m=substr_count($yy->path,",")-1;  //计算类别路径中“,”出现的次数
							$nbsp=str_repeat('&nbsp;',$m*10); 
							?>
							<option value="{{$yy->id}}" {{($xx->jingdian_typeid=="{$yy->id}")?"selected":""}} {{($yy->pid==0)?"disabled":""}}>{{$nbsp}}|---->{{$yy->jingdian_name}}</option>
							@endforeach
						</select>
					  </div>
					</div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图名</label>
                      <div class="col-sm-4">
                        <input type="text" name="jingdian_tuming" value="{{$xx->jingdian_tuming}}" class="form-control" id="inputPassword3" placeholder="图片描述">
                      </div>
                    </div>		
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <input type="file" name="jingdian_picname"  class="form-control" id="inputPassword3" placeholder="图片">
                      </div>
                    </div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">行程安排</label>
							<div class="col-sm-8">
								 <textarea id="container" name="jingdian_detail" type="text/plain">
									{!! $xx->jingdian_detail !!}
								</textarea>
							</div>
					</div>	
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn btn-sm btn-primary" value="修改">
                    </div>
					<div class="col-sm-1">
						<input type="submit" class="btn btn-sm btn-primary" value="重置">
					</div>
                  </div><!-- /.box-footer -->
               </form>
			
	
					<div class="row"><div class="col-sm-12">&nbsp;</div></div>
						  </div><!-- /.box -->
				   
						</div><!--/.col (right) -->
					  </div>   <!-- /.row -->
					</section><!-- /.content -->
					
				@endsection
				@include('UEditor::head');
				@section('bianji')
				
				<script type="text/javascript">
				var ue = UE.getEditor('container');
					ue.ready(function() {
					ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
				});
				</script>
				@endsection
