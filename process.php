<!--
1. topic table에 입력 2. author정보를 확인, 없는 user면 새로생성후, id값조회후, 레코드 추가.-->

<?php
require_once('conn.php');

$author = mysqli_real_escape_string($conn,$_POST['author']);
$sql="SELECT * FROM `user` where `name` = '{$author}'";
$result = mysqli_query($conn, $sql);

if($result->num_rows>0){
  $row = mysqli_fetch_assoc($result); // id가 존재하면, user.id를 알아낸다
  $user_id = $row['id'];
}else{ //존재하지 않는다면, 저자를 user추가후 id를 알아낸다.

  $sql="INSERT INTO user (id, name) VALUES(NULL, '{$author}');";
  $result = mysqli_query($conn, $sql);
  $user_id = mysqli_insert_id($conn); //방금 입력한 레코드의 primary 키의 아이디값을 얻어냄

  // 제목,저자,본분 등을 topic 테이블에 추가
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $sql = "INSERT INTO `topic` (id, title, description, author, created) VALUES (NULL, '{$title}','{$description}', '{$user_id}', now());";
  mysqli_query($conn,$sql);
  //사용자를 index.php로 이동
header('location:index.php');

}

?>
