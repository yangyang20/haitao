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
            width: 70%;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="main">
        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">excel文件：</label>
                <div class="layui-input-block">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn layui-btn-normal" id="excelFile">选择文件</button>
                        <button type="button" class="layui-btn" id="excelUpload">开始上传</button>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文件模板：</label>

                <div class="layui-input-inline">
                    <input type="text" id="tpl_name" class="layui-input w200" placeholder="" onkeyup="tplNameSearch($(this).val())">
                </div>

{{--                    <div class="search-result tpl_name_search_result" style="display: none"></div>--}}
                <div class="layui-input-inline">
                    <select name="tpl_id">
                        <option value="">请选择</option>
                        @foreach($tpl_list as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">经销商：</label>
                <div class="layui-input-block">
                    <span class="channel"></span>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">表格预览：</label>
                <div class="layui-input-block" id="import-review">

                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传结果：</label>
                <div class="layui-input-block">

                </div>
            </div>
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
                $('#import-review').empty()
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