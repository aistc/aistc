<?php
$sourl = $_GET['url'];
$playurl = "https://parse.xymov.net?url=".$sourl;
echo("<html><body style='margin:0; padding:0'>");
echo('<iframe src ="'.$playurl.'" style="border:0;" width="100%" height="100%"></iframe>');
echo("</body></html>");
?>