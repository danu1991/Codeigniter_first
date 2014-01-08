<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Find a word</title>
 
</head>
<body>
<h2>Enter a word to lookup its definition</h2>
<form action="/index.php/dict/define" method=GET>
    Word: <input type=text name="word" onkeyup="fetch(this.value);">
    <input type=submit value="Get definition">
    <div id="mydiv"></div>
</form>
</body>
</html>
<!--
  script tags should be at end of page if possible to speed up load times
-->
<script language="javascript" src="/ecwm604/js/fetch.js">
