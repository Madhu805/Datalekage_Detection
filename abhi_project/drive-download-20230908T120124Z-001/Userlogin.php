<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Lekage Detaction</title>
<meta charset="utf-8" />

<link rel="stylesheet" href="style.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
 
<body class="body">

<header class="mainHeader">
<img src="img/logo.gif">
<nav><ul>
<li ><a href="index.php">Home</a></li>
<li><a href="register.html">Registration</a></li>
<li class="active"><a href="userlogin.php">UserLogin</a></li>
<li ><a href="adminlogin.php">AdminPanel</a></li>
<li><a href="article.php">Articles</a></li>

</ul></nav>
</header>

<div class="mainContent1">
<div class="content">	
<article class="topcontent1">	
<header>
<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> User Login</a></h2>
</header>


<content>
<p>		  
          <form name="s" action="Check_login_user.php" method="POST" onsubmit="return valid()">
            <table align="center" cellpadding="" cellspacing="" width="">
              <tr> 
                <td colspan="2" align="center"><font size="2"><b>
                  </b></font></td>
              </tr>
              <tr> 
                <td><font face="Courier New" size="+1"><strong>UserName</strong></font></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="username" id="username" class="b"></td>
              </tr>
              <tr> 
                <td><font face="Courier New" size="+1"><strong>Password</strong></font></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="password" id="username" class="b"></td>
              </tr>
               <tr> 
                <td><td><input type="submit" name="s" value="submit" class="b1" > 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                  <input type="reset" name="r" value="clear" class="b1"></td>
                    </tr>
             
            </table>
          </form>
        </div>
    </p>
</content>
</article>
 </div>
</div>
<footer class="mainFooter">
<p>Project Design by: Meghana,Manisha,Abhilash</p>
</footer>
 
</body>
</html>
