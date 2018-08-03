@include('public_blade.top')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" charset="utf-8" src="./js/jquery-3.2.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="all" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <center>
    <table border="1px" width="400px">
        <tr>
            <td></td>
            <td>user_id</td>
            <td>nick_name</td>
            <td>is_vip</td>
            <td>操作</td>
        </tr>
        @foreach ($data as $info)
            <tr>
                <td class="qx"><input type="checkbox" name="id[]" value="{{ $info->user_id }}"></td>
                <td>{{ $info->user_id }}</td>
                <td>{{ $info->nick_name }}</td>
                <td>{{ $info->is_vip }}</td>
                <td>
                    
                </td>
            </tr>
        @endforeach
        <tr>
            <td><input type="checkbox" name="delall" value="" class="delall">删?</td>
            <td><input type="submit" name="button" class="button" value="提交"></td>
        </tr>
    </table>

    </form>

{{$data->links()}}
</body>

</html>
<script type="text/javascript">
    $(function(){
        $(".delall").click(function() {
        if(this.checked == true){
            $(".qx>input").each(function() {   
                this.checked = true;   
            });
        }else{
            $(".qx>input").each(function() {   
                this.checked = false;   
            });
        }      
    });

    });
    
</script>
@include('public_blade.footer')