<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	@include('admin.public.Script')
	@include('admin.public.Style')
	<style>
		.main {
			height: 90%;
		}
	</style>
</head>
<body>
<div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
	<a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()"
		 title="刷新">
		<i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<div class="layui-fluid">
	<div class="layui-row layui-col-space15 ">
		<div class="layui-col-md12">
			<div class="layui-card">
				<div class="layui-card-body ">
					<form class="layui-form layui-col-space5">
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="id" placeholder="请输入商品id" value="" autocomplete="off"
										 class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="goods_name" placeholder="请输入商品名称或者别名" value="" autocomplete="off"
										 class="layui-input w200">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="brand_name" placeholder="请输入品牌方" value="" autocomplete="off"
										 class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
						</div>
					</form>
				</div>
				<div class="layui-card-header">
				</div>

				<div class="layui-card-body layui-table-body layui-table-main">
					<table class="layui-table">
						<thead>
						<tr>
							{{--<th>--}}
							{{--<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>--}}
							{{--</th>--}}
							<th>ID</th>
							<th>外部订单号</th>
							<th>经销商</th>
							<th>商品名称</th>
							<th>规格名称</th>
							<th>数量</th>
							<th>收件人</th>
							<th>收件电话</th>
							<th>买家备注</th>
							<th>备注</th>
							<th>导入人</th>
							<th>导入时间</th>
							<th>设置</th>
						</tr>
						</thead>
						<tbody>
						@foreach($orderList as $item)
							<tr>
								{{--<td>--}}
								{{--<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->user_id }}'><i class="layui-icon">&#xe605;</i></div>--}}
								{{--<div class="layui-input-inline" style="width: 40px;">--}}
								{{--<input type="text"  onchange="changeOrder(this,{{ $v->cate_id }})" value="{{ $v->cate_order }}"  autocomplete="off" class="layui-input">--}}
								{{--</div>--}}
								{{--</td>--}}
								<td>{{ $item->id }}</td>
								<td>{{$item->order_sn}}</td>
								<td>{{$item->dealer_name}}</td>
								<td>{{ $item->goods_name }}</td>
								<td>{{$item->goods_attr_name}}</td>
								<td>{{ $item->goods_count }}</td>
								<td>{{$item->consignee}}</td>
								<td>{{$item->consignee_mobile}}</td>
								<td>{{$item->buyer_remark}}</td>
								<td>{{$item->remark}}</td>
								<td>{{$item->add_name}}</td>
								<td>{{$item->add_date}}</td>
								<td class="td-manage">
									<a title="编辑" onclick="xadmin.open('编辑','{{ url("admin/goods/{$item->id}/edit") }}')">
										<i class="layui-icon">&#xe642;</i>
									</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="layui-card-body ">
					<div class="page">
						{!! $orderList->render() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

</body>
<script>
    layui.define(['form'], function () {

    })

    function member_del(id) {
        layer.confirm("确定要删除此商品吗?", function (index) {
            console.log(index);
            $.ajax({
                url: `{{url('admin/goods/${id}')}}`,
                type: 'delete',
                dataType: 'json',
                success: function (res) {
                    layer.close(index)
                    if (res.status == success) {
                        layer.msg(res.msg);
                        location.reload()
                    } else {
                        layer.open(res.msg)
                    }
                }
            })
        })
    }
</script>
</html>
