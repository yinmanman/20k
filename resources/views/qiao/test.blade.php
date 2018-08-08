

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>使用 layDate 独立版</title>
</head>
<body>
  <div class="layui-tab-content">
  <div class="layui-tab-item layui-show">
    <div class="layui-form">
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">限定可选日期</label>
          <div class="layui-input-inline">
            <input class="layui-input" id="test-limit1" placeholder="yyyy-MM-dd" lay-key="20" type="text">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">前后若干天可选</label>
          <div class="layui-input-inline">
            <input class="layui-input" id="test-limit2" placeholder="yyyy-MM-dd" lay-key="21" type="text">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">限定可选时间</label>
          <div class="layui-input-inline">
            <input class="layui-input" id="test-limit3" placeholder="HH:mm:ss" lay-key="22" type="text">
          </div>
          <div class="layui-form-mid layui-word-aux">
            以9:30-17:30为例
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="js/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script type="text/javascript">
  
  //限定可选日期
var ins22 = laydate.render({
  elem: '#test-limit1'
  ,min: '2016-10-14'
  ,max: '2080-10-14'
  ,ready: function(){
    ins22.hint('日期可选值设定在 <br> 2016-10-14 到 2080-10-14');
  }
});
//前后若干天可选，这里以7天为例
laydate.render({
  elem: '#test-limit2'
  ,min: -7
  ,max: 7
});
//限定可选时间
laydate.render({
  elem: '#test-limit3'
  ,type: 'time'
  ,min: '09:30:00'
  ,max: '17:30:00'
  ,btns: ['clear', 'confirm']
}); 
</script>


