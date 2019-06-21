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
      <div class="identity"><span>您是管理者</span></div>
      <ul class=headMenu>
        <li><a class="home"href="homer.php">首頁</a></li>
        <li><a class="tell" href="talkr.php">聯絡我們</a></li>
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
          <li class=List><a href="newsadmin.php">最新消息管理</a></li>
            <li class=List><a href="calendarr.php">行事曆</a></li>
            <li class=List><a href="ruleadmin.php">宿舍公約管理</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitoryadmin.php">住宿申請管理</a></li>
              <li class=dlist><a href="fixadmin.php">報修申請管理</a></li>
              <li class=dlist><a href="borrowadmin.php">設備借用管理</a></li>
            </ul>
      </div>
          </li>
            <li class=List><a href="downloadadmin.php">表單下載管理</a></li>
            <li class=List><a href="albumadmin.php">相簿管理</a></li>
            <li class=List><a href="voteadmin.php">投票系統管理</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">後臺分析<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="fixanalyze.php">維修分析</a></li>
              <li class=dlist><a href="borrowanalyze.php">借用分析</a></li>
              <li class=dlist><a href="voteanalyze.php">投票分析</a></li>
            </ul>
</div>
          </li>
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