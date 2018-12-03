@extends('admin.base.base')


@section('content')
        <form action="delete/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
        </form>
        <center class="content-header">
            <h1>
            <i class="glyphicon glyphicon-music" ></i> 活动信息管理
            
            
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">活动信息</a></li>
            <li class="active">查看</li>
            </ol>
            </section>
            <section class="content">
         
            <div class="row">
                <div class="col-md-12">
                <div class="box">
                <div class="box-header with-border" style="width:300px;float:left;margin-left:20px">
                  <h3 class="box-title">
                    <form action="index" method="get" class="form-inline">
                        <input type="text" class="form-control" name="wan_name" size="16" placeholder="请输活动名" /> 
                        <input type="submit" class="btn btn-primary" value="搜索"/>
                    </form>
                  </h3>
                </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-right:65px;margin-top:10px;float:right"><span class="glyphicon glyphicon-plus"></span>添活动</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">添加活动</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="insert" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">活动名</td>
                    <td><input type="text" name="wan_name"/></td>
                </tr>
                <tr>
                    <td align="right">地点:</td>
                    <td><input type="text" name="wan_location"/></td>
                </tr>
                <tr>
                    <td align="right">门票:</td>
                    <td><input type="text" name="wan_price"/></td>
                </tr>
                <tr>
                    <td align="right">活动时间:</td>
                    <td><input type="text" name="wan_time"/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="wan_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor1" name="wan_content" rows="10" cols="80">
                                     请添加详细描述
                                </textarea>
                              </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="this.form.submit()">添加</button></td>
                </tr>
            </form>
            @if (count($errors)>0)
                <div class="alert alert-danger"style="width:40%">
                   
                        <p style="color:#abcdef;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ "请检查提交信息" }}</p>
                  
                </div>
            @endif
             </table>
                  </div>
                 
                </div>
              </div>
            </div>
            </div>
               

            <div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">修改活动信息</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="/admin/zhoubian/wan/update" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">活动名</td>
                    <td><input type="text" name="wan_name"/></td>
                </tr>
                <tr>
                    <td align="right">地点:</td>
                    <td><input type="text" name="wan_location"/></td>
                </tr>
                <tr>
                    <td align="right">门票:</td>
                    <td><input type="text" name="wan_price"/></td>
                </tr>
                <tr>
                    <td align="right">活动时间:</td>
                    <td><input type="text" name="wan_time"/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="wan_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor2" name="wan_content" rows="10" cols="80">
                                     请添加详细描述
                                </textarea>
                              </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="this.form.submit()">修改</button></td>
                </tr>
            </form>
            @if (count($errors)>0)
                <div class="alert alert-danger"style="width:40%">
                   
                        <p style="color:#abcdef;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ "请检查提交信息" }}</p>
                  
                </div>
            @endif
             </table>
                  </div>
                 
                </div>
              </div>
            </div>
            </div>
               <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover" style="width:90%">
                                <tr>
                                    <th style="width:100px"><i class="fa fa-fw fa-user"></i> 活动名</th>
                                    <th><i class="fa fa-fw fa-picture-o"></i> 活动图片</th>
                                    <th style="width:100px"><i class="fa fa-fw fa-map-marker" ></i> 地点</th>
                                    <th><i class="glyphicon glyphicon-time"></i> 活动时间</th>
                                    <th style="width:70px"><i class="fa fa-fw fa-cny"></i> 门票</th>
                                    <th><i class="fa fa-fw fa-spinner"></i> 添加时间</th>
                                    <th style="width:250px"><i class="fa fa-fw fa-chain-broken"></i> 描述</th>
                                    <th><i class="fa fa-fw fa-gear"></i> 操作</th>
                                </tr>
                                
                            @foreach($list as $wan)
                                <tr>
                                    <td>{{ $wan->wan_name }}</td>
                                    <td> <img src="/admin_zhoubian/s_{{ $wan->wan_picname }}" width="100"> </td>
                                    <td>{{ $wan->wan_location }}</td>
                                    <td>{{ $wan->wan_time }}</td>
                                    <td>{{ $wan->wan_price }}</td>
                                    <td>{{ date("y-m-d h:i:s",$wan->wan_addtime) }}</td>
                                    <td title="{{ $wan->wan_describe }}">{{ mb_substr($wan->wan_describe,0,60) }}...</td>
                                    <td><a href='delete/{{ $wan->id }}'><i class="fa fa-fw fa-trash-o"></i></a> 
                                        <a href='#' class="wan-edit"  data-content="{{json_encode($wan)}}"  data-toggle="modal" data-target="#exampleModal-edit" data-whatever="@mdo" ><i class="fa fa-fw fa-pencil"></i></a>
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
        <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('admins/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
        //处理在线编辑器
        $(function () {
            var config = new Object();
            config.filebrowserImageUploadUrl="{{URL('admin/zhoubian/zbupload')}}?_token={{csrf_token()}}";
            CKEDITOR.replace("editor1",config);
            
            
            var editContent;
            $(".wan-edit").click(function(e){
                editContent = $(this).data('content');
                
                $("#exampleModal-edit").on('shown.bs.modal',function(e){
                    $(this).find('form').attr('action',$(this).find('form').attr('action') + '/' + editContent.id);
                    $("input[name='id']").val(editContent.id);
                    $("input[name='wan_name']").val(editContent.wan_name);
                    $("input[name='wan_location']").val(editContent.wan_location);
                    $("input[name='wan_price']").val(editContent.wan_price);
                    $("input[name='wan_time']").val(editContent.wan_time);
                    $("textarea[name='wan_describe']").val(editContent.wan_describe);
                    $("textarea[name='wan_content']").html(editContent.wan_content);
                    CKEDITOR.replace("editor2",config);
                })
            });
        });
        </script>
        @endsection