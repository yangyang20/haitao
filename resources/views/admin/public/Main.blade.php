<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>阳阳的个人后台</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    @include('admin.public.Script')
    @include('admin.public.Style')
</head>
<body class="index">
<!-- 顶部开始 -->
@include('admin.public.Head')
<!-- 顶部结束 -->
<!-- 中部开始 -->

<!-- 左侧菜单开始 -->
@include('admin.public.Left')
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
@include('admin.public.Right')
<!-- 右侧主体结束 -->

<!-- 中部结束 -->

</body>

</html>
