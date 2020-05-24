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
			width: 90%;
			margin: 20px auto;
			padding-top: 15px;
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
				<div class="layui-card-header">新增产品</div>
				<div class="layui-card-body">
					<form class="layui-form main">
						<div class="layui-form-item">
							<label class="layui-form-label">产品名称</label>
							<div class="layui-input-block">
								<input type="text" name="goods_name" lay-verify="required" placeholder="请输入产品名称" autocomplete="off"
								       class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">产品别名</label>
							<div class="layui-input-block">
								<textarea name="goods_rule_name" placeholder="请输入产品别名" class="layui-textarea"></textarea>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">品牌方</label>
							<div class="layui-input-block">
								<select name="brand_id" lay-verify="required">
									<option value=""></option>
									<option value="0">北京</option>
									<option value="1">上海</option>
									<option value="2">广州</option>
									<option value="3">深圳</option>
									<option value="4">杭州</option>
								</select>
							</div>
						</div>
						<div class="layui-form-item">
							<div class="layui-input-block">
								<input type="submit" class="layui-btn" lay-submit lay-filter="*" value="确认">
								{{--                    <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>--}}
								{{--                <button type="reset" class="layui-btn layui-btn-primary">重置</button>--}}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    layui.define(['form'], function () {
        var form = layui.form

        form.render();

        form.on('submit(*)', function (data) {
            $.ajax({
                url: "{{url('admin/goods')}}",
                type: "post",
                data: data.field,
                dataType: 'json',
                success: function (res) {
                    if (res.status == success) {
                        layer.msg(res.msg, {
                            icon: 6,
                        })
                    } else {
                        layer.alert(res.msg)
                    }
                }
            })

            return false
        })
    })
</script>
</html>
