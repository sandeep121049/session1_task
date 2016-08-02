<html>
<head>

</head>
<body>

<script>
var m=prompt("enter row no");
var n=prompt("enter coloumn no");
if(m==null)
{
  
 window.location.reload();
}
else if(n==null)
{
  window.location.reload();
}

else 
{
var color_td;
document.write("<table>");

for(var i = 1; i <=m; i++) {

  document.write("<tr>");

  for(var j = 1; j <=n; j++) {

    

    document.write("<td style='width:30px;background-color:" + color_td + "'>" + i*j + "</td>");
  }
  document.write("</tr>");
}

document.write("</table>");

}
</script>
</body>
</html>