<style>

</style>

@if(!empty($goodsOrderAggregate))
    <h4 class="red_text">导入订单预览:</h4>
    <table class="layui-table">
        <thead>
        <tr>
            <th>产品名称</th>
            <th>规格名称</th>
            <th>商品数量</th>
            <th>订单数量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($goodsOrderAggregate as $item)
            <tr>
                <td>{{$item['goods_name']}}</td>
                <td>{{$item['goods_attr_name']}}</td>
                <td>{{$item['goods_count']}}</td>
                <td>{{$item['order_count']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
