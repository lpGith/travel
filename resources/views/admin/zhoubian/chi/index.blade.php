@extends('admin.base.base')


@section('content')
        <form action="delete/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
        </form>
        <center class="content-header">
            <h1>
            <i class="glyphicon glyphicon-cutlery" ></i> 餐饮商家信息管理
            
            
            </h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">餐饮商家信息</a></li>
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
                        <input type="text" class="form-control" name="chi_name" size="16" placeholder="请输商家爱店名" /> 
                        <input type="submit" class="btn btn-primary" value="搜索"/>
                    </form>
                  </h3>
                </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-right:65px;margin-top:10px;float:right"><span class="glyphicon glyphicon-plus"></span>添加商家</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">添加商家</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="insert" method="post"enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">商家名</td>
                    <td><input type="text" name="chi_name"/></td>
                </tr>
                <tr>
                    <td align="right">地址:</td>
                    <td><input type="text" name="chi_location"/></td>
                </tr>
                <tr>
                    <td align="right">电话:</td>
                    <td><input type="text" name="chi_phone"/></td>
                </tr>
                <tr>
                    <td align="right">营业时间:</td>
                    <td><input type="text" name="chi_time"/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="chi_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor1" name="chi_content" rows="10" cols="80">
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
                    <h4 class="modal-title" id="exampleModalLabel">修改商家信息</h4>
                  </div>
                  <div class="modal-body">
                    <table border="0" class="table table-bordered table-hover">
            <form action="/admin/zhoubian/chi/update" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td align="right" width="100">商家名</td>
                    <td><input type="text" name="chi_name" value=""/></td>
                </tr>
                <tr>
                    <td align="right">地址:</td>
                    <td><input type="text" name="chi_location" value=""/></td>
                </tr>
                <tr>
                    <td align="right">电话:</td>
                    <td><input type="text" name="chi_phone" value=""/></td>
                </tr>
                <tr>
                    <td align="right">营业时间:</td>
                    <td><input type="text" name="chi_time" value=""/></td>
                </tr>
                <tr>
                    <td align="right">描述：</td>
                    <td><textarea name="chi_describe" style="width:200px;height:80px;"></textarea></td>
                <tr>
                    <td align="right">上传图片：</td>
                    <td><input type="file" name="mypic"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="form-group">
                              <div class="col-sm-10">
                                <textarea id="editor2" name="chi_content" rows="10" cols="80"></textarea>
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
                                    <th style="width:100px"><i class="fa fa-fw fa-user"></i> 商家名</th>
                                    <th><i class="fa fa-fw fa-picture-o"></i> 商家图片</th>
                                    <th style="width:100px"><i class="fa fa-fw fa-map-marker" ></i> 地址</th>
                                    <th><i class="glyphicon glyphicon-phone-alt"></i> 电话</th>
                                    <th style="width:120px"><i class="glyphicon glyphicon-time"></i>营业时间</th>
                                    <th><i class="fa fa-fw fa-spinner"></i> 添加时间</th>
                                    <th style="width:200px"><i class="fa fa-fw fa-chain-broken"></i> 描述</th>
                                    <th><i class="fa fa-fw fa-gear"></i> 操作</th>
                                </tr>
                                
                            @foreach($list as $chi)
                                <tr>
                                    <td>{{ $chi->chi_name }}</td>
                                    <td> <img src="/admin_zhoubian/s_{{ $chi->chi_picname }}" width="100"> </td>
                                    <td>{{ $chi->chi_location }}</td>
                                    <td>{{ $chi->chi_phone }}</td>
                                    <td>{{ $chi->chi_time }}</td>
                                    <td>{{ date("y-m-d h:i:s",$chi->chi_addtime) }}</td>
                                    <td title="{{ $chi->chi_describe }}">{{ mb_substr($chi->chi_describe,0,60) }}...</td>
                                    <td><a href='delete/{{ $chi->id }}'><i class="fa fa-fw fa-trash-o"></i></a> 
                                        <a href='#' class="chi-edit"  data-content="{{json_encode($chi)}}"  data-toggle="modal" data-target="#exampleModal-edit" data-whatever="@mdo" ><i class="fa fa-fw fa-pencil"></i></a>
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
            $(".chi-edit").click(function(e){
                editContent = $(this).data('content');
                
                $("#exampleModal-edit").on('shown.bs.modal',function(e){
                    $(this).find('form').attr('action',$(this).find('form').attr('action') + '/' + editContent.id);
                    $("input[name='chi_name']").val(editContent.chi_name);
                    $("input[name='chi_location']").val(editContent.chi_location);
                    $("input[name='chi_time']").val(editContent.chi_time);
                    $("input[name='chi_phone']").val(editContent.chi_phone);
                    $("textarea[name='chi_describe']").val(editContent.chi_describe);
                    $("textarea[name='chi_content']").html(editContent.chi_content);
                    CKEDITOR.replace("editor2",config);
                })
            });
        });
        </script>
        @endsection