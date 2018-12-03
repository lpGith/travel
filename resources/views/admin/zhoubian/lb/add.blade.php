@extends('admin.base.base')

@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			轮播图管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">轮播图管理</a></li>
            <li class="active">轮播图信息</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i>轮播图信息</h3>
                </div><!-- /.box-header -->
            <table border="0" class="table table-bordered table-hover" style="width:80%">
                <form action="insert" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 
                    <tr>
                        <td align="right"style="width:150px">图片信息</td>
                        <td><input type="text" name="name" style="width:180px"/></td>
                    </tr>
                    <tr>
                        <td align="right">链接地址：</td>
                        <td><input name="path"></td>
                    </tr>
                    <tr>
                        <td align="right">上传图片：</td>
                        <td><input type="file" name="mypic"/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="添加"/>
                            <input type="reset" value="重置"/>
                        </td>
                    </tr>
                </form>
            </table>
            </center>
        <div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      @endsection