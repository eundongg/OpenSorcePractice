// https://velys-log.tistory.com/16 참고하여 작성하였습니다.

<?php
session_start();
if(isset($_POST['submit'])){
    $host = "localhost";
    $username = "root";
    $password = "eundong";
    $db = "web";

    $conn = new mysqli($host, $username, $password, $db);
    $result = $conn->query("insert into user values ('$_POST[id]', '$_POST[pw]');");
    $conn->close();

    if($result == false){
        echo "오류";
    }if(isset($_SESSION['id'])){
        echo " 로그인 중입니다."
        ?>
        <button type="button" 
        onclick="location.href='./main.php';"
        >홈으로</button>
        <button type="button" 
        onclick="location.href='./logout.php';"
        >로그아웃</button>
    <?php
    }
    else{
        echo "회원가입 성공";
        ?>
<button type="button" 
onclick="location.href='./login.php';"
>로그인 하러가기</button>
        <?php
    }
}else{
?>
<form action="./join.php" method="POST"> 
    id: <input  name="id">
    password: <input  name="pw">

    <input type="submit" name="submit">
</form>
<?php
}
?>
