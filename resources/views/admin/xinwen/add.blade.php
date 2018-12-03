@extends('admin.base.base')
@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
      新闻信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">新闻信息管理</a></li>
            <li class="active">添加新闻信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加新闻信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('/admin/abaw')}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="box-body">
           <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">标题</label>
                      <div class="col-sm-4">
                        <input type="text" name="xinwen_name" class="form-control" id="inputPassword3" placeholder="标题">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">投稿地址</label>
                      <div class="col-sm-4">
                        <input type="text" name="xinwen_address" class="form-control" id="inputPassword3" placeholder="投稿地址"/>
                      </div>
                    </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">新闻内容</label>
              <div class="col-sm-10">
                 <textarea id="container" name="xinwen_content" type="text/plain">
                  请输入详情内容!
                </textarea>
              </div>
          </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-1">
            <button type="submit" class="btn btn-primary">提交</button>
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
  @include('UEditor::head');
  @section('bianji')
    
    <script type="text/javascript">
    var ue = UE.getEditor('container');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
  </script>
    @endsection
