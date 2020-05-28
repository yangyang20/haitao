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
            width: 60%;
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
                <div class="layui-card-header">新增经销商</div>
                <div class="layui-card-body">
                    <form class="layui-form main layui-form-pane">
                        <div class="layui-form-item">
                            <label class="layui-form-label">经销商名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" lay-verify="required" placeholder="请输入经销商名称" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">公司名称</label>
                            <div class="layui-input-block">
                                <input name="com_name" placeholder="请输入公司名称" class="layui-input"></input>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">联系人</label>
                            <div class="layui-input-block">
                                <input type="text" name="contact_name" lay-verify="required" placeholder="请输入联系人" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">联系电话</label>
                            <div class="layui-input-block">
                                <input type="text" name="mobile" lay-verify="required" placeholder="请输入联系电话" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">对方邮箱</label>
                            <div class="layui-input-block">
                                <input type="text" name="email" lay-verify="required" placeholder="请输入对方邮箱" autocomplete="off"
                                       class="layui-input">
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
                url: "{{url('admin/dealer')}}",
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
