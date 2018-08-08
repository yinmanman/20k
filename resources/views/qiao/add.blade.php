@include('public_blade.top')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="well with-header  with-footer">
    <div class="header bg-darkorange">
      <h5>影院影厅——电影安排</h5>
    </div>
    <table class="table table-hover table-striped table-bordered table-condensed">
      <thead>
        <tr>
          <?php var_dump($cinema_id1);die; ?>
          <th>电影名称</th>
          <th>电影开始时间</th>
          <th>电影结束时间</th>
          <th>开始上映</th>
          <th>结束上映</th>
        </tr>
      </thead>
    <form action="addMovie" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <tbody id="tbody">
        <tr>
          <td>
            <select class="selectpicker" name="movie_name" id="movie_name">
              <option  selected = "selected">请选择电影</option>
             @foreach ($movie_name as $key => $value)
              <option value="{{ $value->film_id }}" name="film_id"> {{ $value->film_name }}</option>
             @endforeach
           </select>
         </td>
         <td>
          <input type="text" class="form-control" placeholder="电影开始时间" id="test1" name="movie_start">
        </td>
        <td>
          <input type="text" class="form-control laydate-icon" placeholder="电影结束时间"  id="movie_end" name="movie_leave">
        </td>
        <td>
          <input type="text" class="form-control" placeholder="请选择售卖日期" id="test2" name="movie_dangqi_start">
        </td>
        <td>
            <input type="text" class="form-control" placeholder="请选择暂停日期" id="test3" name="movie_dangqi_stop">
        </td>            
      </tr>
    </tbody>
  </table>
    <input type="submit" value="添加" class="btn btn-blue" style="float: right">
</div>
</form>
<body>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
     $('#movie_end').focus(function(){
      var film_id     = $("#movie_name").find("option:selected").val(); 
      var movie_begin = $('#test1').val();
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {"movie_begin":movie_begin,"film_id":film_id},
        url: 'ajax_moie_begin',
        type: 'POST',
        dataType: 'json',
        async : 'false', 
        success: function(data){
          console.log(data);
          $('#movie_end').attr("value",data.movie_leave);
        },
        error:function(data){
          console.log(data);
        }
      });
    });
 </script>
 <script src="/js/laydate/laydate.js"></script>
<script type="text/javascript">
lay('#version').html('-v'+ laydate.v);
//限定可选时间
laydate.render({
   elem: '#test1'
  ,type: 'time'
  ,min: '09:50:00'
  ,max: '17:30:00'
}); 
//限定可选日期
laydate.render({
  elem: '#test2' //指定元素
});
//前后若干天可选，这里以7天为例
laydate.render({
  elem: '#test3' //指定元素
});
</script>
@include('public_blade.footer')
