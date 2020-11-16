<?php
date_default_timezone_set('Asia/Tokyo');
function youbi($ym){
	$today = date('Y-m-j');
	$firstDate = date('Y-m-01', strtotime($ym));
	$day_count = date('t',$timestamp);

	//曜日を取得 (１:月曜日を取得)
	$youbi = date('w',strtotime($firstDate));
	print_r($youbi);
	$week = ' ';
	$weeks = [];
	$week .= str_repeat('<td></td>' , $youbi);
	for($day = 1; $day <= $day_count; $day++,$youbi++){
			$date = $ym . '-' . $day; //日にちを1日ずつ足していく
				if($today == $date){
					$week .= '<td class="today">' . $day;
						} else {
							//今日以外の日付は普通に出力する
								$week .= '<td>' . $day;
						   }
			$week .= '</td>';
			if ($youbi % 7 == 6 || $day == $day_count) {
					if ($day == $day_count) {
							$week .= str_repeat('<td></td>', 6 - ($youbi % 7));
							}
				we($week);
				//print_r($week);
				$weeks[] ='<tr>' . $week . '</tr>';
				//print_r($weeks);
				$week = '';

		   }
	}	  
	return $weeks;
}



		if(isset($_GET['ym'])){
		$ym = $_GET['ym'];
		print_r($ym);
		youbi($ym);
			} else {
				   $ym = date('Y-m');
				   print_r($ym);
				   youbi($ym);
					}
					$timestamp = strtotime($ym . '-01'); 
					if($timestamp == false){
						$ym = date('Y-m');
							$timestamp = strtotime($ym . '-01');
						}
	
						$title = date('Y年m月' , $timestamp);

						//前月・次月の年月を取得する
						
						$prev = date('Y-m',strtotime('-1 month',$timestamp)); //2019-06
						$next = date('Y-m',strtotime('+1 month',$timestamp)); //2019-08;
						$prev_m = date('m',strtotime('-1 month',$timestamp)); //2019-06
						$next_m = date('m',strtotime('+1 month',$timestamp)); //2019-08;
						function pr($prev){
							//print_r($prev);
							echo $prev;
						}
						function ne($next){
							//print_r($prev);
							echo $next;
						}
youbi($ym);
function we($week){
	if(isset($week)){
	$weeks[] ='<tr>' . $week . '</tr>';
	}else{
		//print_r($weeks);
		return $weeks;
	}
}
?>
<!DOCTYPE html>
<html lang="la">
<head>
    <meta charset="UTF-8">
    <title>PHPカレンダー</title>
    <link rel="stylesheet" href="calendar.css">
</head>
<body>

<div class="container">
        <h3><a href="?ym=<?php pr($prev); ?>">&lt;</a> <?php echo $title; ?> <a href="?ym=<?php ne($next); ?>">&gt;</a></h3>
        <table border="1">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <?php
                foreach (youbi($ym , $prev_m ,  $next_m) as $week) {
                    echo $week;
                }
            ?>
        </table>
    </div>
</body>
</html>
