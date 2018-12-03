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
            <li><a href="#">跟团游列表信息管理</a></li>
            <li class="active">修改跟团游列表信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改跟团游列表信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/admin/goupiaolistline/{{$xx->id}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">团游名</label>
                      <div class="col-sm-4">                        
						<input type="text" name="tuangou_name" value="{{$xx->tuangou_name}}" class="form-control" id="inputPassword3" placeholder="团游名">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">产品编号</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_bianhao" value="{{$xx->tuangou_bianhao}}" class="form-control" id="inputPassword3" placeholder="产品编号">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">出发地</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_chufa" value="{{$xx->tuangou_chufa}}" class="form-control" id="inputPassword3" placeholder="出发地">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">目的地</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_mudi" value="{{$xx->tuangou_mudi}}" class="form-control" id="inputPassword3" placeholder="目的地">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">行程概要</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_gaiyao" value="{{$xx->tuangou_gaiyao}}" class="form-control" id="inputPassword3" placeholder="行程概要">
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
                        <input type="text" name="tuangou_price1" value="{{$xx->tuangou_price1}}" class="form-control" id="inputPassword3" placeholder="成人价格">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">儿童价</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_price2" value="{{$xx->tuangou_price2}}" class="form-control" id="inputPassword3" placeholder="儿童价">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">产品经理推荐</label>
                      <div class="col-sm-4">
                        <input type="text" name="tuangou_tuijian" value="{{$xx->tuangou_tuijian}}" class="form-control" id="inputPassword3" placeholder="产品经理推荐">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-2">
						<input type="submit" class="btn  btn-primary" value="修改">
					</div>
					<div class="col-sm-2">
						<input type="submit" class="btn  btn-primary" value="重置">
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
	
 