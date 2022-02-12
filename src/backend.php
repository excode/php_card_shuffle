<?php

$unshuffled = array();
$grp =array('S','H','D','C');
$cardRank = array(2,3,4,5,6,7,8,9,'X','J','Q','K','A');

foreach($grp as $g=> $g_val) {
    foreach($cardRank as $c=> $c_val) {
        array_push($unshuffled, $g_val."-".$c_val);
    }
  }
 
  $original = $unshuffled;
  //print_r($unshuffled );
  shuffle($unshuffled);
  $shuffled = $unshuffled ;
  $numberOfPlayer =isset( $_GET['numberOfPlayer'])? (int) $_GET['numberOfPlayer']:4;


  if( $numberOfPlayer >0){
      $players =array($numberOfPlayer);
      for($i=0;$i<$numberOfPlayer && $i<count($shuffled);$i++)  $players[$i] =array();
      $counter =0;
      foreach($shuffled as $i=> $card) {
      array_push($players[$counter],$card);
      $counter++;
      if($counter==$numberOfPlayer ) $counter=0;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($players);
  }else{
    
    $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

    header('HTTP/1.0 500 Invalid Number');
  }

  //print_r($unshuffled );
?>