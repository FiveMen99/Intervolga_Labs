<?php
echo'
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">Лицей 9</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="students.php">Журнал Успеваемости <span class="sr-only">(current)</span></a>
      </li>   
    </ul>';
session_start();
if(isset($_SESSION['id'])){
    echo '
    <form action="singout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">
      Sign Out
      </button>
    </form>';
    }
else
{
    echo '
    <form action="authorization.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">
      Sign in
      </button>
    </form>';
}
    echo '
  </div>
  </nav>'
  ?>