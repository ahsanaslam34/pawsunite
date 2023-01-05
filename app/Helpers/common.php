<?php 
use Illuminate\Support\Facades\DB;

function getTopNavCat(){
	$result = DB::table('category')->get();
	$arr=[];
	$arr_id=[];
	foreach ($result as $row) {
		// $arr['id']=$row->id;
		$arr_id[]=$row->id;
		$arr[]=$row->des;
	}
	getCatHtml($arr,$arr_id);
}

$html="";
$fiveData="";
// function getCatHtml($arr,$arr_id){
// 	for($i=0;$i<count($arr);$i++){

// 		if($i<=4){
// 			$fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
//                 if ($i==4) {
//                 	echo '<li class="mega-menu-item"><a href="shop.html" class="mega-item-title">
// 		            </a>
// 		            <ul>'.$fiveData.'<ul></li>';
//                 }			
// 		}
// 		if ($i>=5 && $i<=9) {
//                 $fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
//                 if ($i==9) {
//                 	echo '<li class="mega-menu-item"><a href="shop.html" class="mega-item-title">
// 		            </a>
// 		            <ul>'.$fiveData.'<ul></li>';
//                 }	
//         }

// 		if ($i>=10 && $i<=12) {
//                 $fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
//                 if ($i==12) {
//                 	echo '<li class="mega-menu-item"><a href="shop.html" class="mega-item-title">
// 		            </a>
// 		            <ul>'.$fiveData.'<ul></li>';
//                 }	
//         }
		
// 	}

// }


function getCatHtml($arr,$arr_id){
	$fiveData="";
	for($i=0;$i<count($arr);$i++){
		if($i<=4){

			$fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
                if ($i==4) {
              

		            echo '<li class="mega-menu-item"><a href="javascript:void(0)" class="mega-item-title"></a>
                                                <ul>'.$fiveData.'</ul>
                                            </li>';
		            $fiveData="";
                }			
		}
		if ($i>=5 && $i<=9) {
                $fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
                if ($i==9) {
                	echo '<li class="mega-menu-item"><a href="javascript:void(0)" class="mega-item-title"></a>
                                                <ul>'.$fiveData.'</ul>
                                            </li>';
		            $fiveData="";

                }	
        }

		if ($i>=10 && $i<=12) {
                $fiveData.='<li><a href="product?id='.$arr_id[$i].'">'.$arr[$i].'</a></li>';
                if ($i==12) {
                	echo '<li class="mega-menu-item"><a href="javascript:void(0)" class="mega-item-title"></a>
                                                <ul>'.$fiveData.'</ul>
                                            </li>';
		            $fiveData="";

                }	
        }
	}

}

 ?>