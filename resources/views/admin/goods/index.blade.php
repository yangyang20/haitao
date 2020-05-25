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
        .main{
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
					<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
					<button class="layui-btn" onclick="xadmin.open('添加商品','{{url('admin/goods/create')}}',600,400)"><i
								class="layui-icon"></i>添加
					</button>
				</div>

				<div class="layui-card-body layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    {{--<th>--}}
                    {{--<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>--}}
                    {{--</th>--}}
                    <th>ID</th>
                    <th>商品名称</th>
                    <th>品牌方</th>
                    <th>库存</th>
                    <th>默认发货模板</th>
                    <th>产品规格</th>
                    <th>添加时间</th>
                    <th>添加人员</th>
                    <th>审核人员</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($goodsList as $item)
                    <tr>
                        {{--<td>--}}
                        {{--<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->user_id }}'><i class="layui-icon">&#xe605;</i></div>--}}
                        {{--<div class="layui-input-inline" style="width: 40px;">--}}
                        {{--<input type="text"  onchange="changeOrder(this,{{ $v->cate_id }})" value="{{ $v->cate_order }}"  autocomplete="off" class="layui-input">--}}
                        {{--</div>--}}
                        {{--</td>--}}
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->goods_name }}</td>
                        <td>{{$item->brand_name}}</td>
                        <td>{{ $item->repertory }}</td>
                        <td></td>
                        <td>规格</td>
                        <td>{{$item->add_date}}</td>
                        <td>{{$item->add_name}}</td>
                        <td>{{$item->audit_name}}</td>
                        <td>{{$item->status_dis}}</td>
                        <td class="td-manage">
                            <a onclick="recommend(this)" href="javascript:;" data-id="" title="未添加">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑"  onclick="xadmin.add_tab('编辑','{{ url('admin/goods/create') }}')">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <button class="layui-btn layui-btn layui-btn-xs" onclick="xadmin.open('添加规格','{{url("admin/goods/attrIndex/{$item->id}")}}')"><i class="layui-icon"></i>添加规格</button>

                            <a title="删除" onclick="member_del(this)" href="javascript:;">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
				</div>
				<div class="layui-card-body ">
					<div class="page">
              {!! $goodsList->render() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

</body>
    <script>
        layui.define(['form'],function () {

        })
    </script>
</html>
