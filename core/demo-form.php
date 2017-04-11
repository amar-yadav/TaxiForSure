<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">
<?php
session_start();
?>
<h1>WHERE ARE YOU HEADED TODAY?</h1>
<form action = "process2.php" method = "post"/>
<input type = "hidden" name = "formID" value = ""/>
<input type = "hidden" name = "redirect_to" value = "www.google.com"/>
<p>From: <select name="from">
  <option value="Anand Vihar">Anand Vihar</option>
  <option value="Preet Vihar">Preet Vihar</option>
  <option value="Surya Niketan">Surya Niketan</option>
  <option value="Ram Vihar">Ram Vihar</option>
</select></p>
<p>To: <select name="to">
  <option value="Anand Vihar">Anand Vihar</option>
  <option value="Preet Vihar">Preet Vihar</option>
  <option value="Surya Niketan">Surya Niketan</option>
  <option value="Ram Vihar">Ram Vihar</option>
</select></p>

<input type = "submit" value = "Proceed">
</form>
</div>
</body>