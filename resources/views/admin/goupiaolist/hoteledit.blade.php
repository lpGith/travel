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
            <li><a href="#">酒店列表信息管理</a></li>
            <li class="active">修改列表信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改列表信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/admin/goupiaolisthotel/{{$xx->id}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">酒店名</label>
                      <div class="col-sm-4">                        
						<input type="text" name="jiugou_name" value="{{ $xx->jiugou_name}}" class="form-control" id="inputPassword3" placeholder="酒店名">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_address" value="{{ $xx->jiugou_address}}" class="form-control" id="inputPassword3" placeholder="地址">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
                      <div class="col-sm-4">
                        <textarea type="text" name="jiugou_jianjie" class="form-control" id="inputPassword3" placeholder="简介">{{ $xx->jiugou_jianjie}}</textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">评级</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_pingji" value="{{ $xx->jiugou_pingji}}" class="form-control" id="inputPassword3" placeholder="评级">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <input type="file" name="jiugou_picname"  class="form-control" id="inputPassword3" placeholder="图片">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">票种</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_piaozhong" value="{{ $xx->jiugou_piaozhong}}" class="form-control" id="inputPassword3" placeholder="票种">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">市场价</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_price1" value="{{ $xx->jiugou_price1}}" class="form-control" id="inputPassword3" placeholder="市场价">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">优惠价</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_price2" value="{{ $xx->jiugou_price2}}" class="form-control" id="inputPassword3" placeholder="优惠价">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">兑换方式</label>
                      <div class="col-sm-4">
                        <input type="text" name="jiugou_pay" value="{{ $xx->jiugou_pay}}" class="form-control" id="inputPassword3" placeholder="兑换方式">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				     <div class="col-sm-offset-2 col-sm-1">
						<input type="submit" class="btn  btn-primary" value="修改">
					</div>
					<div class="col-sm-1">
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
	
 