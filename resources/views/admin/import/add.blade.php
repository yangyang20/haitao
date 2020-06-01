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
        .config-table td {
            border: 1px solid #d3d9df;
            line-height: normal;
        }
        .td-tips {
            text-align: left;
            font-size: 13px;
            line-height: 30px !important;
        }
        .importTpl-table th{
           width: 110px;
        }
        .importTpl-table tr{
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <div>
        <form  class="layui-form">
            <table class="importTpl-table fill_table">
                <tbody>
                    <tr>
                        <th><label class="layui-form-label">模板名称</label></th>
                        <td> <div class="layui-input-inline">
                                <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input w200">
                            </div>
                        </td>
                        <th><label class="layui-form-label">经销商</label></th>
                        <td> <div class="layui-input-inline">
                                <select name="dealer_id">
                                    <option value="">请选择</option>
                                    @foreach($dealerList as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label class="layui-form-label">开始行数</label></th>
                        <td> <div class="layui-input-inline">
                                <input type="text" name="start_line" required  lay-verify="required" placeholder="请输入开始行数" autocomplete="off" class="layui-input">
                            </div>
                        </td>
                    </tr>
                    <tr class="config-box">
                        <th><label>规则详情：</label></th>
                        <td colspan="3">
                            <table class="config-table">
                                <thead>
                                <tr>
{{--                                    <td>--}}
{{--                                        表格对应列名--}}
{{--                                        <div class="td-tips">输入字母如：A</div>--}}
{{--                                    </td>--}}
                                    <td class="w200">
                                        表格对应列标题
                                        <div class="td-tips">请输入列标题，如 订单编号。</div>
                                    </td>
                                    <td>
                                        数据库字段
                                    </td>
                                    <td>
                                        内置字段
                                        <div class="td-tips">标记为系统预设的字段</div>
                                    </td>
                                    <td>操作</td>
                                </tr>

                                </thead>
                                <tbody class="config-list">

                                <tr class="item" data-index="0">
{{--                                    <td>--}}
{{--                                        <div class="layui-input-inline">--}}
{{--                                            <input type="text" class="layui-input " name="table[0][col]"  value="" placeholder="请输入列名" >--}}
{{--                                        </div>--}}

{{--                                    </td>--}}
                                    <td>
                                        <div class="layui-input-inline">
                                            <input type="text" class="layui-input" name="table[0][title]"  value="" placeholder="请输入标题名" >
                                        </div>
                                    </td>
                                    <td>
{{--                                        <div class="layui-input-inline">--}}
{{--                                            <input type="text" class="layui-input" name="table[0][filter]"  value="" placeholder="请输入字段名" >--}}
{{--                                        </div>--}}
                                        <div class="layui-input-inline">
                                            <select  name="table[0][type]">
                                                @foreach($field_type_arr as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
{{--                                        <div class="layui-input-inline">--}}
{{--                                            <input type="text" class="w100 layui-input" name="table[0][length]"  value="255" placeholder="请输入长度" >--}}
{{--                                        </div>--}}
                                    </td>
                                    <td>
                                        <div class="layui-input-inline">
                                            <select  name="table[0][tag_id]" lay-verify="required">
                                                <option value="">请选择</option>
                                                @foreach($tpl_field_list as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="layui-btn layui-btn-sm layui-btn-danger" href="javascript:remItem($(this))">删除</a>
                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: right"><a class="layui-btn layui-btn-normal" href="javascript:layui.addItem()">增加</a></td>
                                </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th><label>规则说明：</label></th>
                        <td colspan="3" class="td-tips">
                            1.表格列名和列标题可修改， 数据库字段只允许增加，不允许修改和删除！<br>
                            2.请注意标题与字段保持关系一致！如原设置列标题【订单编号】对应字段名为【ddbh】，由于字段名不允许修改，请勿将标题改为【商品列表】等其他意义的标题<br>
                            3.如导入的表格发生变化，请根据表格调整【表格对应列名】即可<br>
                            4.需选择【标记为系统特殊处理的标识】才能正确处理已编写的处理程序，比如规格处理，商品名称等<br>
                            7.同一个渠道如果添加多个模板，系统将采用最后添加的模板<br>
                            <strong style="color: red">8.可以使用多个外部字段对应同一个内置字段,买家备注</strong>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <th></th>
                    <td>
                        <input type="submit" class="layui-btn" lay-submit lay-filter="*" value="确认">
                    </td>
                </tfoot>
            </table>
        </form>
    </div>
</body>

<script>
    layui.define(['form','laytpl'], function(exports){
        var form = layui.form;
        var laytpl = layui.laytpl;
        form.render();

        laytpl.config({
            open: '<%',
            close: '%>'
        });

        // 表单提交
        form.on('submit(*)', function(data){

            $.ajax({
                url:'{{url('admin/import')}}',
                type:'post',
                data:data.field,
                dataType:'json',
                success:function (res) {
                    if (res.status == success){
                        layer.msg(res.msg,{
                            icon: 6,
                        })
                    }else{
                        layer.alert(res.msg)
                    }
                }
            })
            return false;
        });

        //增加行
        function addItem() {
            let index=$('.config-list>.item:last-child').data('index');
            index=parseInt(index)+1;

            let data = { //数据
                "index":index
            }
            let getTpl = $('#tpl').html()

            laytpl(getTpl).render(data, function(html){
                $('.config-list').append(html);
            })
            form.render();
        }
        exports('addItem', addItem);

    });



    //删除行
    function remItem(present) {
        let parent = present.parents('tr')
        parent.remove()
    }
</script>





<script type="text/html" id="tpl">
    <tr class="item" data-index="<%d.index%>">
{{--        <td>--}}
{{--            <div class="layui-input-inline">--}}
{{--                <input type="text" class="layui-input " name="table[<%d.index%>][col]"  value="" placeholder="请输入列名" >--}}
{{--            </div>--}}

{{--        </td>--}}
        <td>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="table[<%d.index%>][title]"  value="" placeholder="请输入标题名" >
            </div>
        </td>
        <td>
            <div class="layui-input-inline">
                <select  name="table[<%d.index%>][type]" lay-verify="required">
                    @foreach($field_type_arr as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </td>
        <td>
            <div class="layui-input-inline">
                <select  name="table[<%d.index%>][tag_id]">
                    <option value="">请选择</option>
                    @foreach($tpl_field_list as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </td>
        <td>
            <a class="layui-btn layui-btn-sm layui-btn-danger" href="javascript:remItem($(this))">删除</a>
        </td>
    </tr>

</script>

</html>
