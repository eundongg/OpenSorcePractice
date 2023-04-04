
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>피최몇?</title>
</head>
   
<body>
  <h1>도미노 피자 선호도 조사</h1>
  <h2>아래의 목록 중에서 선호하는 피자를 고르고 몇 판을 먹고 싶은지 적으세요.</h2>
  <h3>빈 칸은 숫자로만 입력하세요. 모든 칸을 채워야 합니다.</h3>
  <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label>아보카도 새우 :</label>
    <input type="number" name="var1"><br><br>

    <label>블랙타이거 슈림프 :</label>
    <input type="number" name="var2"><br><br>

    <label>블록버스터4 :</label>
    <input type="number" name="var3"><br><br>

    <label>크랩&립 하우스 :</label>
    <input type="number" name="var4"><br><br>

    <label>슈퍼디럭스 :</label>
    <input type="number" name="var5"><br><br>
    
    <input type="submit" value="입력">
  </form>
  <?php
  // 폼에서 입력받은 변수 5개를 POST 방식으로 받아옵니다.
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $servername = "localhost";
    $username = "root";
    $password = "eundong";
    $dbname = "pizza";

    // 데이터베이스 연결 생성
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 연결 확인
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $var1 = $_POST["var1"];
    $var2 = $_POST["var2"];
    $var3 = $_POST["var3"];
    $var4 = $_POST["var4"];
    $var5 = $_POST["var5"];
    // SQL 쿼리문 작성
    $sql = "INSERT INTO pizza (var1, var2, var3, var4, var5)
            VALUES ('$var1', '$var2', '$var3', '$var4','$var5')";

    // 쿼리 실행
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //데이터베이스 연결 종료
    $conn->close();
  }  
  ?>
</body>
</html>

