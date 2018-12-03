@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			管理员信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理员信息管理</a></li>
            <li class="active">添加管理员信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加管理员信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{asset('admin/users')}}/{{ $vo->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">邮箱账号</label>
                      <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" value="{{ $vo->email }}" id="inputEmail3" placeholder="Email">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">姓名</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" value="{{ $vo->name }}" class="form-control" id="inputPassword3" placeholder="YouName">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="radio" name="state" {{ ($vo->state == "1")?"checked":"" }} value="1"> 超级管理员
                            <input type="radio" name="state" {{ ($vo->state == "2")?"checked":"" }} value="2"> 普通管理员
                            <input type="radio" name="state" {{ ($vo->state == "3")?"checked":"" }} value="3"> 禁用状态
                          </label>
                        </div>
                      </div>
					  
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">修改</button>
                    </div>
					<div class="col-sm-1">
						<button type="reset" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection