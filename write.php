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
  <body>
    <header>
      <h1><a href="index.php">생활코딩 Practice2 </a></h1>
    </header>
    <nav>
      <ol>
        <?php
        $sql='SELECT * FROM `topic`';
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
          }
        ?>
      </ol>
    </nav>
    <div id="content">
      <article>
        <form class="" action="process.php" method="post">
          <p>
            <label for="title">제목:</label>
            <input id="title" type="text" name="title" autofocus >
          </p>
          <p>
            <label for="author">저자:</label>
            <input id="author" type="text" name="author" >
          </p>
          <p>
            <label for="description">본문:</label>
            <textarea id="description" name="description" rows="8" col="40"></textarea>
          </p>
          <p>
            <input type="submit" value="전송">
          </p>
        </form>
      </article>
      <!-- CSS 디자인 변경 코드 -->
      <input type="button" name="name" value="White" onclick="document.getElementById('body').className=''">
      <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
      <a href="write.php"> 쓰기 </a>

    </div>
  </body>
</html>
