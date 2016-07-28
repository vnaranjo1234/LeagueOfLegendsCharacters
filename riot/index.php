<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Riot API Test</title>
    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
  <body>

    <div class="content">

     <?php

     $file = "logs/log.txt";
     if((time() - filemtime($file)) > 86400){
       require_once('files/APIKEY.php');
       require_once("logs/log.php");
       $json = @file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=lore,spells&api_key=".$key) or die("API ERROR!");
     }else{
           $json = @file_get_contents("characters.json");
     }
     //print '<table class="table"><tr><th></th><th>Name</th><th>Title</th>';


    $characters = json_decode($json,true);
    //file_put_contents($file,json_encode($json,true));
    //var_dump($characters);


    foreach($characters['data'] as $field => $value){
      //echo $characters['data'][$field]['name']."<br>";

      print '
      <button data-toggle="modal" data-target=".'.$characters['data'][$field]['key'].'">
      <img id="lolsplash" src="http://ddragon.leagueoflegends.com/cdn/6.15.1/img/champion/'
      .$characters['data'][$field]['key'].'.png"></button>
      ';

      print '
      <div class="modal fade '.$characters['data'][$field]['key'].'" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modalcontent">

                <table class="table-responsive">
                  <tr>

                  <td>
                    <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/'.$characters['data'][$field]['key'].'_0.jpg"></img>
                  </td>

                  <td style="overflow:auto">
                    <p id="name">'.$characters['data'][$field]['name'].':
                    '.ucfirst($characters['data'][$field]['title']).'</p>
                    <p>'.$characters['data'][$field]['lore'].'</p>
                  </td>

                  </tr>
                </table>
                <br>
                <table class="table-bordered">
                <tr>
                <td><img src="http://ddragon.leagueoflegends.com/cdn/6.15.1/img/spell/'.$characters['data'][$field]['spells'][0]['image']['full'].'"></td>
                <td class="skilldescription"><u>'.$characters['data'][$field]['spells'][0]['name'].'</u>: '.$characters['data'][$field]['spells'][0]['description'].'</td>
                </tr>

                <tr>
                <td><img src="http://ddragon.leagueoflegends.com/cdn/6.15.1/img/spell/'.$characters['data'][$field]['spells'][1]['image']['full'].'""></td>
                <td class="skilldescription"><u>'.$characters['data'][$field]['spells'][1]['name'].'</u>: '.$characters['data'][$field]['spells'][1]['description'].'</td>
                </tr>

                <tr>
                <td><img src="http://ddragon.leagueoflegends.com/cdn/6.15.1/img/spell/'.$characters['data'][$field]['spells'][2]['image']['full'].'""></td>
                <td class="skilldescription"><u>'.$characters['data'][$field]['spells'][2]['name'].'</u>: '.$characters['data'][$field]['spells'][2]['description'].'</td>
                </tr>

                <tr>
                <td><img src="http://ddragon.leagueoflegends.com/cdn/6.15.1/img/spell/'.$characters['data'][$field]['spells'][3]['image']['full'].'""></td>
                <td class="skilldescription"><u>'.$characters['data'][$field]['spells'][3]['name'].'</u>: '.$characters['data'][$field]['spells'][3]['description'].'</td>

                </tr>

                </table>

            </div>
          </div>
        </div>
      </div>
      ';


    } //end of foreach


     ?>
   </div>

  </body>
</html>
