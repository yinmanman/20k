@include('public_blade.top')
<div class="well with-header  with-footer">
    <div class="header bg-darkorange">
        影片列表
    </div>
    <form action="updateMovie" method="post" enctype="multipart/form-data">
        <input type="hidden" name="film_id" value="<?php echo $data->film_id ?>">
        {!! csrf_field() !!}
        <table class="table table-hover table-striped table-bordered table-condensed">
            <button class="btn btn-azure" id="more_del">批量删除</button> |
            <a class="btn btn-azure" id="add" href="movieAdd">添加</a>
            <tr>
                <td><input type="checkbox"></td>
                <td>电影名称</td>
                <td><input type="text" value="<?php echo $data->film_name ?>" name="film_name"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>电影英文名称</td>
                <td><input type="text" value="<?php echo $data->enname ?>" name="enname"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>是否上映</td>
                <td><input type="radio" value="1" name="is_show">是<input type="radio" value="0" name="is_show">否</td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>评分</td>
                <td><input type="text" value="<?php echo $data->score ?>" name="score"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>电影类型</td>
                <td><input type="text" value="<?php echo $data->type ?>" name="type"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>电影海报</td>
                <td><input type="file" value="" name="poster"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>导演</td>
                <td><input type="text" value="<?php echo $data->director ?>" name="director"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>演员</td>
                <td><input type="text" value="<?php echo $data->actor ?>" name="actor"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>电影分类</td>
                <td><input type="text" value="<?php echo $data->category ?>" name="category"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>地区</td>
                <td><input type="text" value="<?php echo $data->area ?>" name="area"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>语言</td>
                <td><input type="text" value="<?php echo $data->language ?>" name="language"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>片长</td>
                <td><input type="text" value="<?php echo $data->time ?>" name="time"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>上映时间</td>
                <td><input type="text" value="<?php echo $data->showtime ?>" name="showtime"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>发行公司</td>
                <td><input type="text" value="<?php echo $data->company ?>" name="company"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>现价</td>
                <td><input type="text" value="<?php echo $data->present_price ?>" name="present_price"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>原价</td>
                <td><input type="text" value="<?php echo $data->cost_price ?>" name="cost_price"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>排序</td>
                <td><input type="text" value="<?php echo $data->sort ?>" name="sort"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>总场次</td>
                <td><input type="text" value="<?php echo $data->total_field ?>" name="total_field"></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
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
