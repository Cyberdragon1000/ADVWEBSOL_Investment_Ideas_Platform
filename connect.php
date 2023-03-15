<?php
  $Investor Name = $_POST['Investor Name'];
  $Expiry Date = $_POST['Expiry Date'];
  $RiskRating = $_POST['RiskRating'];
  $Key words = $_POST['Key words'];
  $Instruments = $_POST['Instruments'];
  $Product Type = $_POST['Product Type'];
  $Currency = $_POST['Currency'];
  $MajorSector = $_POST['MajorSector'];
  $MinorSector = $_POST['MinorSector'];
  $Region = $_POST['Region'];
  $Country = $_POST['Country'];

  //Database connection

  $conn  = new sqli('localhost','root','',investor's profile page)
  if($conn->connect_error){
    die('connection failed :'.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into invest_profile_page(Investor Name,Expiry Date,,RiskRating,Key words,Instruments,Product Type,Currency,MajorSector,MinorSector,Region,Country)values(?,?,?,?,?,?,?,?,?,?,?)");
          $stmt->bind_param(siissssssss,$Investor Name,$Expiry Date,,$RiskRating,$Key words,$Instruments,$Product Type,$Currency,$MajorSector,$MinorSector,$Region,$Country);
          $stmt->execute();
          echo "submitted succesfully....";
          $stmt->close();
          $conn->close();
  }
  ?>