@extends('admin.base.base')


@section('content')
        <form action="delete/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
        </form>
        <center class="content-header">
            <h1>
            <i class="fa fa-fw fa-automobile"></i> 交通信息管理
            
            
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">交通信息</a></li>
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
                        <input type="text" class="form-control" name="zou_name" size="16" placeholder="请输交通工具" /> 
                        <input type="submit" class="btn btn-primary" value="搜索"/>
                    </form>
                  </h3>
                </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-right:65px;margin-top:10px;float:right"><span class="glyphicon glyphicon-plus"></span>添加交通方式</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">添加交通方式</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="insert" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">交通方式</td>
                    <td><input type="text" name="zou_name"/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="zou_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor1" name="zou_content" rows="10" cols="80">
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
                    <h4 class="modal-title" id="exampleModalLabel">修改交通信息</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="/admin/zhoubian/zou/update" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">交通方式</td>
                    <td><input type="text" name="zou_name"/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="zou_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor2" name="zou_content" rows="10" cols="80">
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
                                    <th style="width:100px"><i class="fa fa-fw fa-user"></i> 交通方式</th>
                                    <th><i class="fa fa-fw fa-picture-o"></i> 图片</th>
                                    <th><i class="fa fa-fw fa-spinner"></i> 添加时间</th>
                                    <th style="width:250px"><i class="fa fa-fw fa-chain-broken"></i> 描述</th>
                                    <th><i class="fa fa-fw fa-gear"></i> 操作</th>
                                </tr>
                                
                            @foreach($list as $zou)
                                <tr>
                                    <td>{{ $zou->zou_name }}</td>
                                    <td> <img src="/admin_zhoubian/s_{{ $zou->zou_picname }}" width="100"> </td>
                                    <td>{{ date("y-m-d h:i:s",$zou->zou_addtime) }}</td>
                                    <td title="{{ $zou->zou_describe }}">{{ mb_substr($zou->zou_describe,0,60) }}...</td>
                                    <td><a href='delete/{{ $zou->id }}'><i class="fa fa-fw fa-trash-o"></i></a> 
                                        <a href='#' class="zou-edit"  data-content="{{json_encode($zou)}}"  data-toggle="modal" data-target="#exampleModal-edit" data-whatever="@mdo" ><i class="fa fa-fw fa-pencil"></i></a>
                                        </td>
                                </tr>
                            @endforeach
                            </table>
                               
                        </div>
                    </div><!-- /.box -->
                
                </div><!-- /.col --> 
            </div><!-- /.row -->
        {!! $list->appends($where)->render() !!}
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
            $(".zou-edit").click(function(e){
                editContent = $(this).data('content');
                
                $("#exampleModal-edit").on('shown.bs.modal',function(e){
                    $(this).find('form').attr('action',$(this).find('form').attr('action') + '/' + editContent.id);
                    $("input[name='id']").val(editContent.id);
                    $("input[name='zou_name']").val(editContent.zou_name);
                    $("textarea[name='zou_describe']").val(editContent.zou_describe);
                    $("textarea[name='zou_content']").html(editContent.zou_content);
                    CKEDITOR.replace("editor2",config);
                })
            });
        });
        
        </script>
        
        @endsection