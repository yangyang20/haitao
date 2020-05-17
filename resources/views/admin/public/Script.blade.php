
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/lib/layui/layui.js')}}" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('admin/js/xadmin.js')}}"></script>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    // 是否开启刷新记忆tab功能
    // var is_remember = false;
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $('form').submit(function () {
            var myform=$('form'); //得到form对象
            var csrf=$("<input type='hidden' name='_token'/>");
            csrf.val($('meta[name="csrf-token"]').attr('content'))
            myform.append(csrf);
            return true
        })
    })

//    返回值定义
    const success = 1   // 成功
    const error = 0   // 失败

</script>
