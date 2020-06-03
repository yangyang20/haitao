<style>
    .red_text{
        color: red;
    }
</style>

@if(!empty($goodsWithout))
    <h4 class="red_text">未识别的产品:</h4>
    <table class="layui-table">
        <thead>
        <tr>
            <th>订单编号</th>
            <th>产品名称</th>
            <th>规格名称</th>
            <th>收件人</th>
        </tr>
        </thead>
        <tbody>
        @foreach($goodsWithout as $item)
        <tr>
            <td>{{$item['order_sn']}}</td>
            <td>{{$item['goods_name']}}</td>
            <td>{{$item['goods_attr_name']}}</td>
            <td>{{$item['consignee']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@if(!empty($attrWithout))
    <h4 class="red_text">未识别的产品规格:</h4>
    <table class="layui-table">
        <thead>
        <tr>
            <th>订单编号</th>
            <th>产品名称</th>
            <th>规格名称</th>
            <th>收件人</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attrWithout as $item)
            <tr>
                <td>{{$item['order_sn']}}</td>
                <td>{{$item['goods_name']}}</td>
                <td>{{$item['goods_attr_name']}}</td>
                <td>{{$item['consignee']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif