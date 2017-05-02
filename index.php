<?php
require_once('conn.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

      <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body id="body" class="">
    <header>
      <h1><a href="index.php">생활코딩 Practice2 </a></h1>
    </header>
    <nav>
      <ol>
        <?php
        $sql='SELECT * from `topic`';
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
          }
        ?>
      </ol>
    </nav>
    <div id="content">
      <article>
        <?php
        if(empty($_GET['id'])){
          echo "WELCOME"; //대문페이지라면
        }else{
          //대문페이지가 아니면,
          $id=mysqli_real_escape_string($conn,$_GET['id']); //사용자 입력정보 세탁, 데이타 출력때는 htmlspecialchars 를 씀.
          $sql="SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author=user.id where topic.id=".$id;
          //user table  과 user table 을 결합.

          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
         ?>

         <h2><?=htmlspecialchars($row['title'])?></h2>
         <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
         <div><?=htmlspecialchars($row['description'])?></div>

         <?php
        }
        ?>

      </article>
      <!--css 디자인 변경 코드-->
      <input type="button" name="name" value="White" onclick="document.getElementById('body').className=''">
      <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
      <a href="write.php"> 쓰기 </a>

    </div>
  </body>
</html>
