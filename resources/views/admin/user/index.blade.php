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
							<input type="text" name="user_name" placeholder="请输入用户名称" value="" autocomplete="off"
							       class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="real_name" placeholder="请输入姓名" value="" autocomplete="off"
							       class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
						</div>
					</form>
				</div>
				<div class="layui-card-header">
					{{--					<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>--}}
					{{--					<button class="layui-btn" onclick="xadmin.open('添加商品','{{url('admin/goods/create')}}',600,400)"><i--}}
					{{--								class="layui-icon"></i>添加--}}
					{{--					</button>--}}
				</div>

				<div class="layui-card-body layui-table-body layui-table-main">
					<table class="layui-table layui-form">
						<thead>
						<tr>
							{{--<th>--}}
							{{--<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>--}}
							{{--</th>--}}
							<th>ID</th>
							<th>用户名</th>
							<th>姓名</th>
							<th>邮箱</th>
							<th>手机号</th>
							<th>最后登录时间</th>
							<th>最后登录ip</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						@foreach($userList as $item)
							<tr>
								{{--<td>--}}
								{{--<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->user_id }}'><i class="layui-icon">&#xe605;</i></div>--}}
								{{--<div class="layui-input-inline" style="width: 40px;">--}}
								{{--<input type="text"  onchange="changeOrder(this,{{ $v->cate_id }})" value="{{ $v->cate_order }}"  autocomplete="off" class="layui-input">--}}
								{{--</div>--}}
								{{--</td>--}}
								<td>{{ $item->id }}</td>
								<td>{{ $item->user_name }}</td>
								<td>{{$item->real_name}}</td>
								<td>{{ $item->email }}</td>
								<td>{{$item->mobile}}</td>
								<td>{{$item->last_login_date}}</td>
								<td>{{$item->last_login_ip}}</td>
								<td class="td-status">
									<input type="checkbox" data-id="{{$item->id}}" value="{{$item->status}}" {{$item->status?'checked':''}} lay-filter="status" lay-skin="switch" lay-text="正常|暂停">
								</td>
								<td class="td-manage">
									<a title="编辑"  onclick="xadmin.open('编辑','{{ url("admin/import/{$item->id}/edit") }}')">
										<i class="layui-icon">&#xe642;</i>
									</a>
									<a title="删除" onclick="member_del({{$item->id}})" href="javascript:;">
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
						{!! $userList->render() !!}
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

    function member_del(id) {
        layer.confirm("确定要删除此用户吗?",function (index) {
            console.log(index);
            $.ajax({
                url:`{{url('admin/user/${id}')}}`,
                type:'delete',
                dataType:'json',
                success:function (res) {
                    layer.close(index)
                    if (res.status == success){
                        layer.msg(res.msg);
                        location.reload()
                    }else{
                        layer.open(res.msg)
                    }
                }
            })
        })
    }
</script>
</html>
