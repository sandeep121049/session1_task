<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="main1.css"/>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script type="text/javascript">
	   // alert();
	    	/*function a()
	    	{	//alert();
	    		document.getElementById("b").style.fontSize=100px;
	    	}*/

	    	function sss(page){
	    	//alert(page);
 			document.getElementById('search_frm').action = 'Page1.php?page='+page;
 			document.getElementById('search_frm').submit();
	    	}
	    </script>
	</head>
	<body style ="background-color:#d7f4fb">
	<form name="search_frm" id="search_frm" action="" method="POST">
		<div id="header">
			<div id="main">
				<div id ="google">
					<h1 id="heading"> <font color='blue'>G</font><font color='red'>o</font><font color='yellow'>o</font><font color='blue'>g</font><font color='green'>l</font><font color='red'>e</font></h1>
				</div>
				<div id="text">	
					<input type="text" name="name1" id="search_element" size="50px" 
					value=
					"<?php if(isset($_POST['name1']))
					{	echo $_POST['name1'];
					}
					?>">	
					<input type="submit" value="search" id="search_button">
				</div>
				<div id="blank">
					<div id="subblank1"><a href="#" onmouseover="a();">All</a></div>
					<div id="subblank2"><a href="#" onmouseover="a();">News</a></div>
					<div id="subblank3"><a href="#" onmouseover="a();" >Videos</a></div>
					<div id="subblank4"><a href="#" onmouseover="a();" >Images</a></div>
					<div id="subblank5"><a href="#" onmouseover="a();">More</a></div>
	`			</div>
			</div>	
		</div>
	</form>
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";
		$conn =  mysql_connect($servername, $username, $password);
		mysql_select_db($dbname,$conn);
		/*if ($conn==true) 
		{
			echo "connection established";
		} 
		else
		{
			die("Connection failed");
		} 
		*/
		if($_POST)
		{	
			$page=$_GET['page'];
	 		if($page==""||$page=='1')
	 		{
	 			$page1=0;
	 		}
	 		else
	 		{
	 			$page1=($page*3)-3;
	 		}
			$name=$_POST['name1'];
			//echo $name;
			
			$sql = "Select * from `SearchEngine` where `MetaDesc` like '%".$name."%' limit $page1,3";
			$r=mysql_query($sql);
			//echo $sql;
			//$row=mysql_fetch_array($r);  
			//$num_rec_per_page=3; 
			$sql1 = "Select * from `SearchEngine` where `MetaDesc` like '%".$name."%'";
			$r1=mysql_query($sql1);
	 		$cou = mysql_num_rows($r1);
	 		//echo $cou;
	 		$a=$cou/3;
			$a = ceil($a); 
			

			
			if(empty($cou))
			{
				echo "<p id='b1'>Search item not found</p>";
			}
			while($row=mysql_fetch_array($r))
			{

				?>
				
				<div id="metadata">
				<div class="submetadata">
					<span class="demo"><?php  echo "<a href='".$row[3]."'>".$row[3]."</a>";?></span>
					<p><span class="demo1" id="link"><?php echo $row[1];?></span></p>
					<p><span class="demo1"><?php echo $row[2];?></span></p>
					
				</div>
				</div>
			    
		     	<?php
			}
			for($b=1;$b<=$a;$b++)
			{ //echo $b;
				?>
				<div class="pagination">
				<a href="javascript:void(0);" onClick="sss(<?php echo $b; ?>);"><?php echo $b; ?></a>
				</div>
			<?php
			}	
		}
		
		?>
		</body>
	     		</html>
	