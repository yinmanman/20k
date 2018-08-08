@include('public_blade.top')
    <div class="well with-header  with-footer">
        <div class="header bg-darkorange">
            <h5>影院影厅——电影安排</h5>
        </div>
        <table class="table table-hover table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>影厅号</th>
                <th>影厅名称</th>
            </tr>
            </thead>
            <tbody id="tbody">
            @foreach ($cinema_data as $k => $v)
                <tr>
                    <td>{{ $v->house_id }}</td>
                    <td>
                        <a href="house_Setting_list?house_id=<?= $v->house_id ?>&cinema_id={{$cinema_id}}">{{ $v->house_name }}</a>
                    </td>               
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<body>
@include('public_blade.footer')
