<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="topnav" id="myTopnav">
    <a class="nav-link" href="index.php">Home</a>
    <a class="nav-link" href="register.php">Register</a>
    <a class="nav-link" href="login.php">Login</a>
    <a class="nav-link" href="logout.php">Logout</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</nav>

<?php
    include 'includes/config.php';

    if (isset($_GET['message'])) {
        echo "<p> $_GET[message]</p><hr>";
    }
?>

<script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                  x.className += " responsive";
              } else {
                  x.className = "topnav";
              }
        }


      function getActive() {
          var navClass = document.getElementsByClassName("nav-link");
          var path = window.location.href;

          for (i = 0; i < navClass.length; i++) {
              if (path.includes(navClass[i])) {
                  navClass[i].classList.add('active')
              } else {
                  navClass[i].className = 'nav-link'
              }
          }
      }

      getActive()


  </script>
    
