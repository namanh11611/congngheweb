<?php
function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ắ|ằ|ẳ|ẵ|ặ|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ắ|Ằ|Ẳ|Ẵ|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ố|ồ|ổ|ộ|ỗ|ớ|ờ|ở|ợ|ỡ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ố|Ồ|Ổ|Ộ|Ỗ|Ớ|Ờ|Ở|Ợ|Ỡ',
        'u' => 'ú|ù|ủ|ụ|ũ|ứ|ừ|ử|ự|ữ',
        'U' => 'Ú|Ù|Ủ|Ụ|Ũ|Ứ|Ừ|Ử|Ự|Ữ',
        'y' => 'ỳ|ý|ỷ|ỵ|ỹ',
        'Y' => 'Ỳ|Ý|Ỷ|Ỵ|Ỹ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str;
}

function changeTitle($str){
    $str=trim($str);
    if($str=="") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
    //MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str = str_replace(' ', '-', $str);
    return $str;
}

function cate_parent($data,$parent = 0,$str="--",$select=0){
	foreach ($data as $val){
		$id = $val["id"];
		$name = $val["name"];
		if($val["parent_id"] == $parent){
			if ($select != 0 && $id == $select){
				echo "<option value='$id' selected='selected'>$str $name</option>";
			}else{
				echo "<option value='$id'>$str $name</option>";
			}
			cate_parent($data, $id, $str."--", $select);
		}		
	}
}

function totalOrderIn($id){
    $total = 0;
    $detail = DB::table('order_inputs')->where('order_inputs.id', $id)
        ->join('order_in_products', 'order_inputs.id', '=', 'order_in_products.orderin_id')->get();
    foreach ($detail as $item_detail){
        $total += $item_detail->quantity*$item_detail->price_in;
    }
    return $total;
}

function totalOrderOut($id){
    $total = 0;
    $detail = DB::table('order_outputs')->where('order_outputs.id', $id)
        ->join('order_out_products', 'order_outputs.id', '=', 'order_out_products.orderout_id')->get();
    foreach ($detail as $item_detail){
        $total += $item_detail->quantity*$item_detail->price_out;
    }
    return $total;
}

?>