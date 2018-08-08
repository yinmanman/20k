@include('public_blade.top')
<div class="well with-header  with-footer">
    <div class="header bg-darkorange">
        影片列表
    </div>
    <form action="addMovie" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
    <table class="table table-hover table-striped table-bordered table-condensed">
        <button class="btn btn-azure" id="more_del">批量删除</button> |
        <a class="btn btn-azure" id="add" href="movieAdd">添加</a>
        <tr>
            <td>电影名称</td>
            <td><input type="text" value="" name="film_name"></td>
        </tr>
        <tr>
            <td>电影英文名称</td>
            <td><input type="text" value="" name="enname"></td>
        </tr>
        <tr>
            <td>是否上映</td>
            <td><input type="radio" value="1" name="is_show">是<input type="radio" value="0" name="is_show">否</td>
        </tr>
        <tr>
            <td>评分</td>
            <td><input type="text" value="" name="score"></td>
        </tr>
        <tr>
            <td>电影类型</td>
            <td><input type="text" value="" name="type"></td>
        </tr>
        <tr>
            <td>电影海报</td>
            <td><input type="file" value="" name="poster"></td>
        </tr>
        <tr>
            <td>导演</td>
            <td><input type="text" value="" name="director"></td>
        </tr>
        <tr>
            <td>演员</td>
            <td><input type="text" value="" name="actor"></td>
        </tr>
        <tr>
            <td>电影分类</td>
            <td><input type="text" value="" name="category"></td>
        </tr>
        <tr>
            <td>地区</td>
            <td><input type="text" value="" name="area"></td>
        </tr>
        <tr>
            <td>语言</td>
            <td><input type="text" value="" name="language"></td>
        </tr>
        <tr>
            <td>片长</td>
            <td><input type="text" value="" name="time"></td>
        </tr>
        <tr>
            <td>上映时间</td>
            <td><input type="text" value="" name="showtime"></td>
        </tr>
        <tr>
            <td>发行公司</td>
            <td><input type="text" value="" name="company"></td>
        </tr>
        <tr>
            <td>现价</td>
            <td><input type="text" value="" name="present_price"></td>
        </tr>
        <tr>
            <td>原价</td>
            <td><input type="text" value="" name="cost_price"></td>
        </tr>
        <tr>
            <td>排序</td>
            <td><input type="text" value="" name="sort"></td>
        </tr>
        <tr>
            <td>总场次</td>
            <td><input type="text" value="" name="total_field"></td>
        </tr>
        <tr>
            <td>是否排片</td>
            <td><input type="radio" value="1" name="is_slice">是<input type="radio" value="0" name="is_slice">否</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="submit"></td>
        </tr>
    </table>
    </form>
</div>
@include('public_blade.footer')