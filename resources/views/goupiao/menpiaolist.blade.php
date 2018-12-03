@extends('goupiao.list')

@section('menpiaocontent')
<div class="pro-contenter clearfix marginTop">
		<div class="pro-liestWrap">
			<div class="pro-leftTop">
				<dl class="clearfix">					
					<dd></dd>
				</dl>
			</div>
			@foreach($list as $xx)
			<div class="pro-listContent marginTop" id="contentinfo">
 				<div class="pro-list clearfix">
					<a href="/goupiaodetail?id={{$xx->id}}" class="proimg"><img src="./uploads/{{$xx->list_picname}}"></a>
					<div class="pro-listTxt">
						<h3><a href="/goupiaodetail?id={{$xx->id}}">{{$xx->list_name}}</a></h3>
						<p><em>地址：</em>{{$xx->list_address}}</p>
						<p><em>简介：</em>{{$xx->list_jianjie}}</p>
					</div>
					<div class="pro-listPrice">
						<span><em>￥</em>{{$xx->list_shichangprice}} <i>起</i></span>
						
					</div>

					<div class="tabInfo" style="clear: both">
						<table class="ticket-tab">
							<thead>
								<tr>
									<th>票种</th>
									<th>市场价</th>
									<th>优惠价</th>
									<th>兑换方式</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$xx->list_piaozhong}}</td>
									<td>￥{{$xx->list_shichangprice}}</td>
									<td><span>￥{{$xx->list_youhuiprice}}</span></td>
									<td>{{$xx->list_style}}</td>
									<td><a href="/goupiaopay?id={{$xx->id}}" >预订</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
 				
 			</div>
			@endforeach
			<div id="pageInfo" class="public-pageBox marginTop p_pageWrap">
				<div class="p_pageBox"><span class="nowcur">1</span><span>1/1页</span></div>
			</div>
			
		</div>
		<div class="pro-siderBarWrap">
			
			<div class="pro-siderInfo">
				<dl class="clearfix">
					<dt>热</dt>
					<dd>热卖推荐</dd>
				</dl>
				@foreach($model as $xx)
				<div class="pro-siderList clearfix">
					<h3><a href="/ticket/detail/3.html">{{$xx->list_name}}</a></h3>
					<p>入园保证</p>
					<span><i>￥</i>{{$xx->list_shichangprice}} <em>起</em></span>
				</div>
				@endforeach
			</div>
		</div>

	</div>
	<!-- 产品列表  end -->
	</div>
	
	<!-- 产品列表  end -->
@endsection