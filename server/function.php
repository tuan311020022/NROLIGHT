<?php

function format_date($time){
    return date("H:i:s d/m/Y", $time);
}
function card24h($api_card, $loaithe, $menhgia, $seri, $pin, $code)
{
    $callback = BASE_URL('api/card.php');
    $url_api = 'https://card1s.top/';
    $json = json_decode(curl_get($url_api.'api/card-auto.php?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$api_card.'&callback='.$callback.'&content='.$code), true);
    return $json;
}
function redirect($url){
    if(!empty($url))
     header("location: {$url}");
}
function daily($data)
{
    if($data == 0)
    {
        return 'Thành viên';
    }
    else if($data == 1)
    {
        return 'Đại lý';
    }
}
function trangthai($data)
{
    if($data == 'xuly')
    {
        return 'Đang xử lý';
    }
    else if($data == 'hoantat')
    {
        return 'Hoàn tất';
    }
    else if($data == 'thanhcong')
    {
        return 'Thành công';
    }
    else if($data == 'huy')
    {
        return 'Hủy';
    }
    else if($data == 'thatbai')
    {
        return 'Thất bại';
    }
    else
    {
        return 'Khác';
    }
}
function BASE_URL($url)
{
    global $base_url;
    return $base_url.$url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}

function msg_success2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "'.$text.'","success");</script>');
}
function msg_error2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "'.$text.'","error");</script>');
}
function msg_warning2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "'.$text.'","warning");</script>');
}
function msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}



function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="badge badge-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="badge badge-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="badge badge-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="badge badge-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="badge badge-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}


/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */