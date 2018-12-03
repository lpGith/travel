@extends('admin.base.base')

@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			景点信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">景点信息管理</a></li>
            <li class="active">添加景点信息</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i>添加景点信息</h3>
                </div><!-- /.box-header -->
            <table border="0" class="table table-bordered table-hover">
            <form action="/admin/zhoubian/you/update/{{ $avo->id }}" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">景点名</td>
                    <td><input type="text" name="you_name" value="{{ $avo->you_name }}"/></td>
                </tr>
                <tr>
                    <td align="right">门票:</td>
                    <td><input type="text" name="you_price" value="{{ $avo->you_price }}"/></td>
                </tr>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor1" name="you_content" rows="10" cols="80">
                                    {{ $avo->you_content }}"
                                </textarea>
                              </div>
                        </div>
                    </td>
                </tr>
                
                 <tr>
                    <td colspan="2" align="left">
                        <input type="submit" value="添加"/>
                        <input type="reset" value="重置"/>
                    </td>
                </tr>
            </form>
            @if (count($errors)>0)
                <div class="alert alert-danger"style="width:40%">
                   
                        <p style="color:#abcdef;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ "请检查提交信息" }}</p>
                  
                </div>
            @endif
             </table>
        </center>
         <div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('admins/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            var config = new Object();
            config.filebrowserImageUploadUrl="{{URL('admin/zhoubian/zbupload')}}?_token={{csrf_token()}}";
            CKEDITOR.replace("editor1",config);
        });
        </script>
    @endsection