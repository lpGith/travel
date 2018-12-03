@extends('admin.base.base')


@section('content')
        <form action="delete/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
        </form>
        <center class="content-header">
            <h1>
            <i class="fa fa-fw fa-home" ></i> 景点信息管理
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">景点信息</a></li>
            <li class="active">查看</li>
            </ol>
            </section>
            <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                         <button type="button" class="btn btn-primary"  style="margin-right:65px;margin-top:10px;float:right" onclick="location='/admin/zhoubian/you/add' "><span class="glyphicon glyphicon-plus"></span>添加景区</button>
                        <div class="box-header with-border" style="width:300px;float:left;margin-left:20px">
                          <h3 class="box-title">
                            <form action="index" method="get" class="form-inline">
                                <input type="text" class="form-control" name="you_name" size="16" placeholder="请输入景点名" /> 
                                <input type="submit" class="btn btn-primary" value="搜索"/>
                            </form>
                           
                          </h3>
                        </div>
            
               <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover" style="width:90%">
                                <tr>
                                    <th style="width:100px"><i class="fa fa-fw fa-user"></i> 所属路线</th>
                                    <th style="width:100px"><i class="fa fa-fw fa-user"></i> 景区名</th>
                                    <th><i class="fa fa-fw fa-picture-o"></i> 景区图片</th>
                                    <th style="width:70px"><i class="fa fa-fw fa-cny"></i> 门票</th>
                                    <th><i class="fa fa-fw fa-spinner"></i> 添加时间</th>
                                    <th><i class="fa fa-fw fa-gear"></i> 操作</th>
                                </tr>
                                
                            @foreach($list as $you)
                                <tr>
                                    <td>{{ $you->you_typename }}</td>
                                    <td>{{ $you->you_name }}</td>
                                    <td> <img src="/admin_zhoubian/s_{{ $you->you_picname }}" width="100"> </td>
                                    <td>{{ $you->you_price }}</td>
                                    <td>{{ date("y-m-d h:i:s",$you->you_addtime) }}</td>
                                    <td><a href='delete/{{ $you->id }}'><i class="fa fa-fw fa-trash-o"></i></a> 
                                        <a href='edit/{{ $you->id }}'><i class="fa fa-fw fa-pencil"></i></a>
                                        </td>
                                </tr>
                            @endforeach
                            </table>
                                {!! $list->appends($where)->render() !!}   
                        </div>
                    </div><!-- /.box -->

                </div><!-- /.col --> 
            </div><!-- /.row -->
        </center>
        @endsection