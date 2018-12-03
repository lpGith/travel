@extends('admin.base.base')
    
  @section('content')
  <script type="text/javascript">
            function doDel(id){
        Modal.confirm({msg:"确定要删除吗？"}).on(function(e){
          if(e){
            var form = document.myform;
            form.action = '/admin/role/'+id;
            form.submit();
          }
        });
      } 
      </script>
    <section class="content-header">
          <h1>
            角色信息输出表
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL('/admin')}}"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li class="active">浏览角色列表</li>
          </ol>
        </section>

        <!-- Main content -->
         <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i>角色信息管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <form action="/admin/role/" method="post" name="myform" style="display:none;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" name="_method" value="delete"/>
        </form>
        <form>
          <div class="input-group">
              <input type="text" name="name" class="form-control" placeholder="name"/>
            <span class="input-group-btn">
              <button type='submit' name='search' id='search-btn' class="btn btn-flat btn-primary"><i class="fa fa-search"></i>搜索</button>
            </span>
          </div>
        </form>
                  <table class="table table-bordered">
                    <tr style="background-color:#ddd;">
                      <th style="width:100px;">ID</th>
                      <th>角色名称</th>
                      <th style="width:270px">操作</th>
                    </tr>
          @foreach($list as $role)
                    <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td> 
            <td>
              <button class="btn btn-xs btn-success" onclick="store()" data-toggle="modal" data-target="#add">添加角色</button>
              <button onclick="doDel({{ $role->id }})" class="btn btn-xs btn-danger">删除角色</button>
              <a type="button" onclick="update(this);" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal">修改角色</a>
              <button class="btn btn-xs btn-success" onclick="loadNode({{ $role->id }},'{{ $role->name}}')">分配节点</button>
            </td>
                    </tr>
          @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
          {!! $list->appends($where)->render() !!}
                  </ul>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
      
        </section><!-- /.content -->
    
    <!-- 修改 -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改信息</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
                <form class="form-horizontal" id="form" action="/admin/role/" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">角色名称:</label>
              <div class="col-sm-4">
                <input type="text" id="me" name="name" class="form-control" id="inputPassword3" placeholder="name">
              </div>
            </div>
                    </div>
                  </div><!-- /.box-body -->
              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">修改</button>
              </div>
              </form>
              
            </div>
          </div>
        </div>
    <!--添加-->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加信息</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
                <form class="form-horizontal" id="form" action="/admin/role" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" class="form-control" name="addtime" value="<?php echo time();?>"/>
                    <div class="box-body">
                        <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">角色名称:</label>
              <div class="col-sm-4">
                <input type="text" id="me" name="name" class="form-control" id="inputPassword3" placeholder="name">
              </div>
            </div>
                    </div>
                  </div><!-- /.box-body -->
              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
              </form>
              
            </div>
          </div>
        </div>
  @endsection
  @section('bianji')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <div class="modal-body">  
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" onclick="saveNode()" class="btn btn-primary">保存</button>
        </div>
      </div>
      </div>
    </div>
  
<script>
  //修改
  function update(obj)
  {
    var up = $(obj).parent().parent().find('td');
    $('#form').attr("action","/admin/role/"+up.eq(0).text());
    $('#me').val(up.eq(1).text());
    $('#update').modal('show');
  }
  
   function loadNode(rid,name){
            $("#exampleModalLabel").html(name+"的操作节点管理");
            $("#exampleModal").modal("show");
            $.ajax({
                url:"{{URL('admin/role/loadNode')}}/"+rid,
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                  $("#exampleModal .modal-body").html(data);   
                },
             });
        }
        
        //保存节点信息
        function saveNode(){
            $.ajax({
                url:"{{URL('admin/role/saveNode')}}",
                type:"post",
                dataType:"html",
                data:$("#nodelistform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                },
             });
             
        }
</script>
@endsection