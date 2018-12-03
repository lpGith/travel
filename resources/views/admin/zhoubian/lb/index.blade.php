@extends('admin.base.base')

@section('content')
        <center class="content-header">
            <h1>
            <i class="fa fa-fw fa-home" ></i> 轮播图管理
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">轮播图管理</a></li>
            <li class="active">查看</li>
            </ol>
            </section>
            <div class="box-header with-border" style="width:300px;float:left;margin-left:20px">
                 <h3 class="box-title">
                        <input type="button" class="btn btn-primary" onclick="location='/admin/zhoubian/lb/add' " value="添加轮播图"/>
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
                                    <th> 图片介绍</th>
                                    <th> 图片</th>
                                    <th> 链接地址</th>
                                    <th> 添加时间</th>
                                    <th>操作</th>
                                </tr>
                                
                            @foreach($list as $lunbo)
                                <tr>
                                    <td>{{ $lunbo->name }}</td>
                                    <td> <img src="/admin_zhoubian/{{ $lunbo->picname }}" style="width:150px"> </td>
                                    <td>{{ $lunbo->path }}</td>
                                    <td>{{ date("Y年m月d日",$lunbo->addtime) }}</td>
                                    <td>
                                        <a href='delete/{{ $lunbo->id }}'><i class="fa fa-fw fa-trash-o"></i></a> 
                                        <a href='edit/{{ $lunbo->id }}' class="chi-edit"><i class="fa fa-fw fa-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                    </div><!-- /.box -->
                
                </div><!-- /.col --> 
            </div><!-- /.row -->
        </center>
        
        @endsection