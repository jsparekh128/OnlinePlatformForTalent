<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Contact Us</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form action="insertcontact.php" method = "post">
    <label for="fname">Name</label>
    <input type="text"  name="firstname" placeholder="Your name.." Required>

    <label for="lname">Email</label>
    <input type="text"  name="txtemail" placeholder="Your last name.." Required>

    <label for="college">College</label>
    <select  name="ddlcollege">
      <option value="MBIT">MBIT</option>
	  <option value="ADIT">ADIT</option>
	  <option value="BVM">BVM</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="txtsubject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="Submit">
    
  </form>
</div>
<p><h4>
For further details :
</h4> 
<fieldset>

<legend>Contact Details
</legend>

Email address: 
<a href>forte@gmail.com</a><br><br>

Contact No.: 9910924563
</p>
 
</fieldset>
<center><b><a class="btn btn-success" href="home.php">Return to homepage</a></b><center>
</body>
</html>



</body>
</html>
