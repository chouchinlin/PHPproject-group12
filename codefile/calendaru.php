<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="calendarr.css">
  <script> 
$(document).ready(function(){
  $(".dropdown").hover(function(){
    $('dropdown').toggleClass('open');
    $( ".dropdownMenu" ).slideToggle( "slow");
  });
});
</script> 
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <div class="identity"><span>您是使用者</span></div>
      <ul class=headMenu>
        <li><a class="home"href="homeu.php">首頁</a></li>
        <li><a class="tell" href="talku.php">聯絡我們</a></li>
        <li><a class="log" href="logout.php">登出</a></li>
      </ul>
      <div class="c"></div>
      </div>
      <div class="content">
        <div class="menu">
        <div class="menuh">
          <div class="bf"><h3>分類清單</h3></div>
        </div>
          <ul class=cmenu >
          <li class=List><a href="newsu.php">最新消息</a></li>
            <li class=List><a href="calendaru.php">行事曆</a></li>
            <li class=List><a href="ruleu.php">宿舍公約</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitory.php">住宿申請</a></li>
              <li class=dlist><a href="fix.php">報修申請</a></li>
              <li class=dlist><a href="borrow.php">設備借用</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="downloadu.php">表單下載</a></li>
            <li class=List><a href="albumu.php">相簿</a></li>
            <li class=List><a href="voteu.php">投票</a></li>
          </ul>
        </div>
        <div class="new">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.css" rel="stylesheet"  />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.print.css" rel="stylesheet" media="print"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.js"></script>
			
  <div id="example"></div>
  <script>
  	$( "#example" ).fullCalendar({
  		header: {
  			left: "prev,next today",
  			center: "title",
  			right: "month,basicWeek,basicDay"
  		},
  		defaultDate: "2019-06-13",
  		weekends: true,
  		editable: true,
  		events: [ 
  			{ 
  				title: "宿舍同樂會",
  				start: "2019-06-14"
  			},
  			{
  				title: "大家期中考加油",
  				start: "2019-06-23",
  				end:   "2019-06-25"
  			},
  			{ 
  				title: "宿舍大門維修",
  				start: "2019-06-17",
  				end: "2019-06-19"
  			},
  			{
  				title: "宿委會開會",
  				start: "2019-06-21T10:30:00"
  			},
  			{
  				title: "消防安全講座(點此了解詳情)",
  				url: "https://www.nfa.gov.tw/cht/index.php?code=list&ids=298",
  				start: "2019-06-28"
  			}
  		]
  	});
  </script>

         
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>