<?php
header('Content-type: text/javascript');
echo 'placefinder.datain("';
$latlon = $_GET['latlon'];
$url='http://where.yahooapis.com/geocode?q='.$latlon.'&gflags=ACR&flags=QRGSTXP&appid=YD-bs4vWJU_JXrmPwSfQ8yStcfWoDA5n51J';
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);
$data = unserialize($output);
$found = false;
if($data['ResultSet']['Result'][0]){
  $set = $data['ResultSet']['Result'][0];
  echo '<ul>';
  foreach(array_keys($set) as $s){
    if($set[$s]!=''){
      if(!$found && strpos($s,'line') !== false){
        $found = true;
        $name = $set[$s];
      }
      if(is_array($set[$s])){
        echo '<li><span>'.ucfirst($s).': </span><ul>';
        foreach(array_keys($set[$s]) as $x){
          if($set[$s][$x]!=''){
            echo '<li><span>'.ucfirst($x).': </span>'.$set[$s][$x].'</li>';
          }
        }
        echo '</ul></li>';
      } else {
        echo '<li><span>'.ucfirst($s).': </span>'.$set[$s].'</li>';
      }
    }
  }
  echo '</ul>';
}
echo '","'.$latlon.'","'.$name.'")';
?>