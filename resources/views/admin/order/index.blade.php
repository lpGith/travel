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
            <li><a href="#">订单信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <div class="col-sm-9"><h3 class="box-title"><i class="fa fa-th"></i> 订单信息管理</h3></div>
				 
				
                </div><!-- /.box-header -->
				<form action="/admin/order" method="get" class="form-inline">
					用户id:<input type="text" class="form-control" name="pay_typeid" /> 
					<input type="submit" class="btn btn-large btn-primary" value="搜索"/>
					<input type="button" onclick="window.location='/admin/order'" class="btn btn-flat btn-primary" value="显示全部"/>
				</form>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">订单号</th>
                      <th>用户id</th>
                      <th>订单类型</th>
                      <th>姓名</th>
                      <th>身份证号</th>
                      <th>邮箱</th>
                      <th>手机号</th>
                      <th>总金额</th>
                      <th>是否付款</th>
                      <th>出发日期</th>
                      <th>交易时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>                   
                      @foreach ($list as $xx)
                    <tr>
                        <td>{{$xx->id}}</td>
                        <td>{{$xx->pay_typeid}}</td>
                        <td>{{$xx->pay_type}}</td>
                        <td>{{$xx->pay_name}}</td>
                        <td>{{$xx->pay_ID}}</td>
                        <td>{{$xx->pay_email}}</td>
                        <td>{{$xx->pay_phone}}</td>
                        <td>{{$xx->pay_total}}</td>
                        
                        <td>{{($xx->pay_state==1)?"未付款":"已经付款"}}</td>
						<td>{{$xx->pay_time}}</td>
                        <td>{{date("Y-m-d H:i:s",$xx->pay_addtime)}}</td>
                        <td>
                            <a href="/admin/y_delete11?id={{$xx->id}}"><button class="btn btn-xs btn-danger">删除</button></a>
                        
                        </td>
                    </tr>
                @endforeach                 
                  </table>
				  {!! $list->appends($where)->render() !!}
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
       
    @endsection