

<html>

<head>

<title>DATABASE</title>

<meta http-equiv="Content-Type" content="text/JSON; charset=utf-8">
<meta http-equiv="Content-Type" content="text/css; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/javascript; charset=utf-8">
<meta http-equiv="Content-Type" content="text/xml; charset=utf-8">

</head>

<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$link = mysqli_connect("localhost","root",""); //host name, username, password
$client = new SoapClient ("http://footballpool.dataaccess.eu/data/info.wso?wsdl");

if (!$link) {

 die("Connection Error " . mysql_error());
}
echo "Connection Successful";

	// if (mysqli_query($link,"CREATE DATABASE Football"))

	// 	echo 'Database Created';
	//  else {
	//     echo 'Error Creating Database' .mysqli_connect_error();

	//    mysqli_close($link);
	//  }


 mysqli_select_db($link ,"Football");

//  //TABLES


//  //Players Table

// $table1="CREATE TABLE Players ( 
//   iId INT(20) NOT NULL AUTO_INCREMENT,
//   sName VARCHAR(50),
//   sCountryName VARCHAR(50), 
//   sCountryFlag VARCHAR(50),  
//   sCountryFlagLarge VARCHAR(50),  
//   PRIMARY KEY(iId))";

// mysqli_query($link,$table1);


// // // //Teams Table

// $table2="CREATE TABLE Teams (
//   TeamID INT(20) NOT NULL AUTO_INCREMENT ,
//   tName VARCHAR(50),
//   tCountryFlag VARCHAR(50), 
//   tCountryFlagLarge VARCHAR(50),
//   tWikipedieaURL VARCHAR(50),
//   iCompeted INT(20), 
//   tCoach VARCHAR(50), 
//   Groups VARCHAR(20),
//   PRIMARY KEY(TeamID))";

// mysqli_query($link,$table2);


// // // // Stadium Table

// $table3="CREATE TABLE StadiumInfo (
//    StadiumID INT(20) NOT NULL AUTO_INCREMENT,
//    stadiumName VARCHAR(50),
//    sCapacity INT(20),
//    cityName VARCHAR(50),
//    sWikipediaURL VARCHAR(50), 
//    sGoogleMapsURL VARCHAR(50),
//    PRIMARY KEY(StadiumID))";

// mysqli_query($link,$table3);


// // //  //GameInfo Table

// $table4="CREATE TABLE tGameInfo (
//    iId INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//    sDescription VARCHAR(50),
//    dPlayDate DATE, 
//    tPlayTime TIME,
//    iUTCOffset INT(20),
//    StadiumInfo INT(20) ,
//    FOREIGN KEY (StadiumInfo) REFERENCES StadiumInfo(StadiumID),
//    Team1 INT(20),
//    FOREIGN KEY (Team1) REFERENCES Teams(TeamID),
//    Team2 INT(20),
//    FOREIGN KEY (Team2) REFERENCES Teams(TeamID),
//    sResult VARCHAR(50),
//    sScore VARCHAR(50),
//    iYellowCards INT(20),
//    iRedCards INT(20),
//    bChampion BOOLEAN )";

// mysqli_query($link,$table4);


// // //  // Goal Table

// $table5="CREATE TABLE tGoal (
//    Gid INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
// 	  dGame DATE,
// 	  Iminute INT(20),
// 	  sPlayerName VARCHAR(50),
// 	  sTeamName VARCHAR(50),
// 	  sTeamFlag VARCHAR(50), 
// 	  sTeamFlagLarge VARCHAR(50))";

// mysqli_query($link,$table5);

// // //  // Card Table

// $table6="CREATE TABLE tCardInfo (
// 	  cID INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
// 	  dGame DATE,
// 	  iMinute INT(20),
// 	  sPlayerName INT(20),
//   	FOREIGN KEY (sPlayerName) REFERENCES Players(iId),
//       bYellowCard BOOLEAN, 
// 	  bRedCard BOOLEAN )";

//  mysqli_query($link,$table6);

// // // // GoalKeepers Table

// $table7= "CREATE TABLE sGoalKeepers (
//   TeamID INT(20),
//   String VARCHAR(50),
//   PRIMARY KEY(TeamID,String), 
//   FOREIGN KEY (TeamID) REFERENCES Teams(TeamID))";

// mysqli_query($link,$table7);


// // // // Defenders Table

// $table8= "CREATE TABLE sDefenders (
//   String VARCHAR(50),
//   TeamID INT(20),
//   Players INT(20),
//   PRIMARY KEY(TeamID,String),
//   FOREIGN KEY (TeamID) REFERENCES Teams(TeamID),
//   FOREIGN KEY (Players) REFERENCES Players(iId))";

// mysqli_query($link,$table8);

// // // //MidField Table

// $table9= "CREATE TABLE sMidFields 
//  (String VARCHAR(50),
//   TeamID INT(20),
//   Players INT(20),
//   PRIMARY KEY(TeamID,String),
//  FOREIGN KEY (TeamID) REFERENCES Teams(TeamID),
//  FOREIGN KEY (Players) REFERENCES Players(iId))";

// mysqli_query($link,$table9);

// // // // Forwards Table

// $table10= "CREATE TABLE sForwards (
//  String VARCHAR(50),
//  TeamID INT(20),
//  Players INT(20),
//  PRIMARY KEY(TeamID,String),
//  FOREIGN KEY (TeamID) REFERENCES Teams(TeamID),
//  FOREIGN KEY (Players) REFERENCES Players(iId))";
// mysqli_query($link,$table10);

 //INSERTS

 // insert Players

 // $result = $client->AllPlayerNames(array('bSelected' => true));
 // $array = $result->AllPlayerNamesResult->tPlayerNames;

 //        foreach ($array as $key=>$v){
 		

 // 	$values= "INSERT INTO Players (iId,sName,sCountryName,sCountryFlag,sCountryFlagLarge) 
 //  	VALUES ('$v->iId','$v->sName','$v->sCountryName','$v->sCountryFlag','$v->sCountryFlagLarge')";

 //    $res= mysqli_query($link,$values);


 //   }


 //insert Teams

//  $result = $client->Groups(array());
//  $array = $result->GroupsResult->tGroupInfo;
// 		foreach ($array as $k=>$g){

//  $result1 = $client->GroupCompetitors(array('sPoule' => $g->sCode));
//  $array1 = $result1->GroupCompetitorsResult->tTeamInfo;

//         foreach ($array1 as $key=>$v){
//  		$result2 = $client->FullTeamInfo(array('sTeamName' => $v->sName));
//  		$full = $result2->FullTeamInfoResult;

//  	$values= "INSERT INTO Teams (TeamID,tName,tCountryFlag,tCountryFlagLarge, tWikipedieaURL,iCompeted,tCoach,Groups) 
//   	VALUES ('$v->iId','$v->sName','$v->sCountryFlag','$v->sCountryFlagLarge','$v->sWikipediaURL','$full->iCompeted','$full->sCoach','$g->sCode')";

//     $res= mysqli_query($link,$values);

//      $result3 = $client->AllGoalKeepers(array('sCountryName' => $v->sName));
//  	 $array3 = $result3->AllGoalKeepersResult->string;
//     foreach ($array3 as $k1=>$va){
//     	$values= "INSERT INTO sGoalKeepers (TeamID,String) 
//   	VALUES ('$v->iId','$va')";
//          $res= mysqli_query($link,$values);
//     }

//     $result4 = $client->AllForwards(array('sCountryName' => $v->sName));
//  	 $array4 = $result4->AllForwardsResult->string;
//     foreach ($array4 as $k1=>$va){
//     	$values= "INSERT INTO sForwards (TeamID,String) 
//   	VALUES ('$v->iId','$va')";
//          $res= mysqli_query($link,$values);
//     }

//     $result5 = $client->AllDefenders(array('sCountryName' => $v->sName));
//  	 $array5 = $result5->AllDefendersResult->string;
//     foreach ($array5 as $k1=>$va){
//     	$values= "INSERT INTO sDefenders (TeamID,String) 
//   	VALUES ('$v->iId','$va')";
//          $res= mysqli_query($link,$values);
//     }

//     $result6 = $client->AllMidFields(array('sCountryName' => $v->sName));
//  	 $array6 = $result6->AllMidFieldsResult->string;
//     foreach ($array6 as $k1=>$va){
//     	$values= "INSERT INTO sMidFields (TeamID,String) 
//   	VALUES ('$v->iId','$va')";
//          $res= mysqli_query($link,$values);
//     }

//   }
// }

 // //insert  Stadium

 //    $result = $client->AllStadiumInfo(array());
 //    $array = $result->AllStadiumInfoResult->tStadiumInfo;
  
 // foreach($array as $result =>$v){

	// $result1 = $client->StadiumInfo(array('sStadiumName' => $v->sStadiumName));
 //    $v1 = $result1->StadiumInfoResult;

			
 // 		$values= "INSERT INTO StadiumInfo (stadiumName,sCapacity,cityName,sWikipediaURL,sGoogleMapsURL) 
 // 		VALUES ('$v1->sStadiumName','$v1->iSeatsCapacity','$v1->sCityName','$v1->sWikipediaURL','$v1->sGoogleMapsURL' )";
	// 	$result = mysqli_query($link,$values);

 // }


// insert Game Info

 // $resultw = $client->AllGames(array());
 // $arrayx = $resultw->AllGamesResult->tGameInfo;
 //        foreach ($arrayx as $r=>$v){
 		
 // 	$s = $v->StadiumInfo->sStadiumName;
 // 	$idarr = mysqli_query($link,"SELECT StadiumID FROM StadiumInfo WHERE stadiumName='$s'");
 // 	$id = 0;
 // 	while ($record = mysqli_fetch_array($idarr)) {
 // 		$id = $record['StadiumID'];
 // 	}
 // 	$t1 = $v->Team1->iId;
 // 	$t2 = $v->Team2->iId;

 // 	$values= "INSERT INTO tGameInfo (iId,sDescription,dPlayDate,tPlayTime,iUTCOffset,StadiumInfo, Team1, Team2, sResult, sScore, iYellowCards,iRedCards,bChampion) 
 //  	VALUES ('$v->iId','$v->sDescription','$v->dPlayDate','$v->tPlayTime', '$v->iUTCOffset', '$id', '$t1','$t2', '$v->sResult' 
 //  		, '$v->sScore', '$v->iYellowCards', '$v->iRedCards', '$v->bChampion')";
 
 //    $result = mysqli_query($link,$values);
 //  			 }



// insert Goals

// $result = $client->GoalsScored(array('iGameId' => ""));
// $array = $result->GoalsScoredResult->tGoal;

// foreach($array as $result =>$v1){
			
//  		$values= "INSERT INTO tGoal (dGame,Iminute,sPlayerName,sTeamName,sTeamFlag,sTeamFlagLarge) 
//  		VALUES ('$v1->dGame','$v1->iMinute','$v1->sPlayerName','$v1->sTeamName','$v1->sTeamFlag','$v1->sTeamFlagLarge'  )";

// 		$result = mysqli_query($link,$values);

//  }


//insert Cards

// $result = $client->AllCards(array());
// $array = $result->AllCardsResult->tCardInfo;

// foreach($array as $result =>$v1){
// 			$idarrp = mysqli_query($link,"SELECT iId FROM Players WHERE sName= '$v1->sPlayerName' ");
// 			$idp = 0;
// 			while ($recordp = mysqli_fetch_array($idarrp)) {
// 			$idp = $recordp['iId'];
// 			}
//  		$values= "INSERT INTO tCardInfo (dGame,iMinute,sPlayerName,bYellowCard,bRedCard) 
//  		VALUES ('$v1->dGame','$v1->iMinute','$idp','$v1->bYellowCard','$v1->bRedCard')";

// 		$result = mysqli_query($link,$values);

//  }





?>
</body>
</html>