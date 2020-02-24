<?php
echo'
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="header">
  <a href="" id="index" onclick="index();event.preventDefault();" class="navbar-brand"  >Лицей 9</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" onclick="students();event.preventDefault();" id="students " href="">Журнал Успеваемости <span class="sr-only">(current)</span></a>

      </li>   
      <li class="nav-item active">
        <a class="nav-link" id="testsafetyrequest" onclick="testsafetyrequest();event.preventDefault();" href="">Защита запросов<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div class="form-inline mt-2 mt-md-0">
        <input class="form-inline mt-2 mt-md-0 form-control mr-sm-2"  name="search"   type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="postsearch()" id="searchbutton" type="submit">Search</button>
      </div>
    ';
session_start();
if(isset($_SESSION['id'])){
    echo '
        <a class="nav-link" style="color:#ffffff">'.$_SESSION['id'].'<span class="sr-only">(current)</span></a>';
    echo '<button onclick="authorizationout()" class="btn btn-secondary my-2 my-sm-0" type="submit">
      Sign Out
      </button>';
    }
else
{
    echo '
      <button onclick="authorization()" class="btn btn-secondary my-2 my-sm-0" style="margin-left:10px; " type="submit">
      Sign in
      </button>';

}
    echo '
  </div>
  </nav>';
session_write_close();
  ?>