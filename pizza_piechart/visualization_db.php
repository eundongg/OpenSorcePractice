<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Count');

        <?php
        // 데이터베이스 연결 설정
        $servername = "localhost";
        $username = "root";
        $password = "eundong";
        $dbname = "pizza";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // 데이터베이스에서 값 가져오기
        $sql = "SELECT var1, var2, var3, var4, var5 FROM pizza ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        // 파이차트에 적용할 데이터 생성
        $data = array();
        $data[] = array('Task', 'Count');
        while($row = $result->fetch_assoc()) {
          $data[] = array('아보카도 새우 피자', intval($row['var1']));
          $data[] = array('블랙타이거 슈림프 피자', intval($row['var2']));
          $data[] = array('블록버스터4 피자', intval($row['var3']));
          $data[] = array('크랩&립 하우스 피자', intval($row['var4']));
          $data[] = array('슈퍼디럭스 피자', intval($row['var5']));
          break;
        }
        
        
        // 데이터베이스 연결 종료
        $conn->close();

        
        ?>

        var options = {
          title: '피자 선호도'
        };

        var chartData = google.visualization.arrayToDataTable(<?php echo json_encode($data) ?>);
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(chartData, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

