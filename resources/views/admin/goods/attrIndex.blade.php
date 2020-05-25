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
        .item-card{
            margin: 30px 20px;
            width: 330px;
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
    <button class="layui-btn" style="line-height:1.6em;margin-top:3px;float:right" onclick="xadmin.open('新增规格','{{url("admin/goods/attr/create/{$goods_id}")}}',500,400)"><i
            class="layui-icon"></i>新增规格
    </button>
</div>
<div class="layui-container">
    @foreach($attrList as $item)
    <div class="layui-row">
        @foreach($item as $attr)
        <div class="layui-col-md4">
            <a onclick="xadmin.open('修改规格','{{url("admin/goods/attr/edit/{$attr['id']}")}}',500,400)">
                <div class="layui-card item-card">
                    <div class="layui-card-header">{{$attr['attr_name']}}</div>
                    <div class="layui-card-body">
                        添加人:{{$attr['add_name']}}<br>
                        添加时间: {{$attr['add_date']}}<br>
                        规格数量: {{$attr['attr_count']}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach
</div>

</body>
</html>
