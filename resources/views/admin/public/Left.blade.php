<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="用户管理">&#xe6b8;</i>
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
{{--                    <li>--}}
{{--                        <a onclick="xadmin.add_tab('统计页面','welcome1.html')">--}}
{{--                            <i class="iconfont">&#xe6a7;</i>--}}
{{--                            <cite>统计页面</cite></a>--}}
{{--                    </li>--}}
                    <li>
                        <a onclick="xadmin.add_tab('用户列表','{{url('admin/user')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>用户列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('新增用户','{{url('admin/user/create')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>新增用户</cite></a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            <cite>权限管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>权限列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('等级管理','member-list1.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>权限设置</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                    <cite>订单管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('订单列表','{{url('admin/order')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>订单列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('增加历程','{{url('admin/timeline/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>增加历程</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="导入管理">&#xe723;</i>
                    <cite>导入管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('导入文件列表','{{url('admin/import/importLogIndex')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>导入文件列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('导入模板列表','{{url('admin/import')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>导入模板列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('添加导入模板','{{url('admin/import/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加导入模板</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('导入文件','{{url('admin/importOrderIndex')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>导入文件</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="发货管理">&#xe723;</i>
                    <cite>发货管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('发货模板列表','{{url('admin/articles')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>发货模板列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('发货列表','{{url('admin/articles/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>发货列表</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="产品管理">&#xe723;</i>
                    <cite>产品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('产品列表','{{url('admin/goods')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>产品列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('增加产品','{{url('admin/goods/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>增加产品</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="采购管理">&#xe6b4;</i>
                    <cite>采购列表管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('提交采购','{{url('admin/category')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>提交采购</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('采购列表','{{url('admin/category/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>采购列表</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="收款管理">&#xe6b4;</i>
                    <cite>收款列表管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('收款列表','{{url('admin/category')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>收款列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('提交收款账单','{{url('admin/category/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>提交收款账单</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="品牌方管理">&#xe6b4;</i>
                    <cite>品牌方管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('品牌方列表','{{url('admin/brand')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>品牌方列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('添加品牌方','{{url('admin/brand/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加品牌方</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="经销商管理">&#xe6b4;</i>
                    <cite>经销商管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('经销商列表','{{url('admin/dealer')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>经销商列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('添加经销商','{{url('admin/dealer/create')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加经销商</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('管理员列表','admin-list.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('角色管理','admin-role.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>角色管理</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('权限分类','admin-cate.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限分类</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('权限管理','admin-rule.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限管理</cite></a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="其它页面">&#xe6b4;</i>
                    <cite>页面设置</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            <cite>首页管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('首页配置列表','{{url('admin/setpage')}}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>首页配置列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('增加首页配置','{{url('admin/setpage/create')}}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>增加首页配置</cite></a>
                            </li>
                        </ul>
                    </li>

{{--                    <li>--}}
{{--                        <a onclick="xadmin.add_tab('首页设置','{{asset('admin/setpage/homePageIndex')}}')">--}}
{{--                            <i class="iconfont">&#xe6a7;</i>--}}
{{--                            <cite>首页设置</cite></a>--}}
{{--                    </li>--}}
                    <li>
                        <a onclick="xadmin.add_tab('错误页面','error.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>错误页面</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('示例页面','demo.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>示例页面</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('更新日志','log.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>更新日志</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="第三方组件">&#xe6b4;</i>
                    <cite>layui第三方组件</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('滑块验证','https://fly.layui.com/extend/sliderVerify/')" target="">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>滑块验证</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('富文本编辑器','https://fly.layui.com/extend/layedit/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>富文本编辑器</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('eleTree 树组件','https://fly.layui.com/extend/eleTree/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>eleTree 树组件</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('图片截取','https://fly.layui.com/extend/croppers/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>图片截取</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('formSelects 4.x 多选框','https://fly.layui.com/extend/formSelects/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>formSelects 4.x 多选框</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('Magnifier 放大镜','https://fly.layui.com/extend/Magnifier/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>Magnifier 放大镜</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('notice 通知控件','https://fly.layui.com/extend/notice/')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>notice 通知控件</cite></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
