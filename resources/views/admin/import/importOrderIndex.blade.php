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
    <div>
        <form class="layui-form">
            <table class="fill_table">
                <tbody>

                <tr>
                    <th>
                        <label class="layui-form-label">excel文件：</label>
                    </th>
                    <td>
                        <div class="layui-upload">
                            <button type="button" class="layui-btn layui-btn-normal" id="excelFile">选择文件</button>
                            <button type="button" class="layui-btn" id="excelUpload">开始上传</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="layui-form-label">文件模板：</label>
                    </th>
                    <td>
                        <div class="layui-input-inline">
                            <input type="text" id="tpl_name" class="layui-input" placeholder="" onkeyup="tplNameSearch($(this).val())">
                        </div>

                        <div class="search-result tpl_name_search_result" style="display: none"></div>
                        <div class="layui-input-inline">
                            <select name="tpl_id">
                                <option value="">请选择</option>
                                @foreach($tpl_list as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="layui-form-label">经销商：</label>
                    </th>
                    <td><span class="channel"></span></td>
                </tr>


                <tr>
                    <th>
                        <label class="layui-form-label">表格预览：</label>
                    </th>
                    <td id="import-review">

                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="layui-form-label">上传结果：</label>
                    </th>
                    <td id="run-log">

                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" class="layui-btn layui-btn-warm"  value="确认导入">
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</body>
<script>
    layui.define(['form','upload'],function (exports) {
        let form = layui.form;
        let upload = layui.upload;

        let data = {}

        form.render()


        //选完文件后不自动上传
        upload.render({
            elem: '#excelFile'
            ,url: '{{url('admin/importOrderPreview')}}'
            ,auto: false
            ,accept: 'file' //普通文件
            //,multiple: true
            ,bindAction: '#excelUpload'
            ,data: data
            ,before: function(obj){
                let tpl_id = $('[name=tpl_id]').val()
                data['tpl_id'] = tpl_id
                layer.load(); //上传loading
            }
            ,done: function(res){
                layer.closeAll()
                console.log(res)
                if (res.status == success){
                    layer.msg(res.msg);
                    $('#import-review').append(res.data.html);
                }else{
                    layer.alert(res.msg);
                    $('#import-review').append(res.data.html);
                }

            }
        });


    })
</script>
</html>