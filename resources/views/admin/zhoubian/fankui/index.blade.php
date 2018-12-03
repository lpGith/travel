@extends('admin.base.base')


@section('content')
        <center class="content-header">
            <h1>
            <i class="fa fa-fw fa-home" ></i> 反馈处理
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">反馈处理</a></li>
            <li class="active">查看</li>
            </ol>
            </section>
            <div class="box-header with-border" style="width:300px;float:left;margin-left:20px">
                  <h3 class="box-title">
                    <form action="ckfankui" method="get" class="form-inline">
                        处理状态<select class="form-control" name='zhuangtai'>
                          <option value="">全部</option>
                          <option value="1">已回复</option>
                          <option value="0">未回复</option>
                        </select>
                        <input type="submit" value="搜索">
                    </form>
                  </h3>
                </div>
            <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
            
               <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover" style="width:90%">
                                <tr>
                                    <th style="width:100px"></i> 游客用户名</th>
                                    <th style="width:100px"></i> 游客邮箱</th>
                                    <th style="width:300px"></i> 留言信息</th>
                                    <th></i> 留言时间</th>
                                    <th style="width:150px"></i> 处理状态</th>
                                    <th></i> 操作</th>
                                </tr>
                                
                            @foreach($list as $fankui)
                                <tr>
                                    <td>{{ isset($fankui->user)?$fankui->user:"游客" }}</td>
                                    <td>{{ $fankui->email }}</td>
                                    <td>{{ $fankui->content }}</td>
                                    <td>{{ date("Y-m-d",$fankui->addtime) }}</td>
                                    <td>{{ ($fankui->zhuangtai == '1')?'已回复':'未回复' }}</td>
                                    <td><button type="button" class="btn btn-success" onclick="location.href='/admin/zhoubian/ckfankui/edit/{{ $fankui->id }}'">回复</button></td>
                                </tr>
                            @endforeach
                            </table>
                            
                                {!! $list->render() !!}   
                        </div>
                    </div><!-- /.box -->
                
                </div><!-- /.col --> 
            </div><!-- /.row -->
        </center>
        
        @endsection