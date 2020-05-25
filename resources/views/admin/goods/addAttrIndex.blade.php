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
</head>
<body>
<div class="layui-card">
    <div class="layui-card-header">产品规格</div>
    <div class="layui-card-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">规格名称</label>
                <div class="layui-input-inline">
                    <input type="text" name="attr_name" placeholder="请输入规格名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">规格别名</label>
                <div class="layui-input-block">
                    <textarea name="alias_name" placeholder="请输入规格别名" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">规格数量</label>
                <div class="layui-input-inline">
                    <input type="text" name="attr_count" placeholder="请输入规格数量" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="hidden" name="goods_id" value="{{$goods_id}}">
                    <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
{{--                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>--}}
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    layui.define(['form'],function () {
        var form = layui.form

        form.on('submit(*)',function (data) {
            $.ajax({
                url:"{{url('/admin/goods/attr/store')}}",
                type:"post",
                data:data.field,
                dataType:'json',
                success:function (res) {
                    if (res.status == success){
                        layer.msg(res.msg)
                        window.parent.location.reload()
                    }else{
                        layer.alert(res.msg)
                    }
                }
            })
            return false;
        })

    })
</script>
</html>
