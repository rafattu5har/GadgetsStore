var array1 = new Array()
var array2 = []
for ( var i = 0; i < array1.length; i++)
{
 document.write(array1[i]);
}

document.write(person["fname"]);

function validateform()
{
  var g = document.forms["myform"]["fname"].value;
  var x = document.forms["myform"]["uname"].value;
  var y = document.forms["myform"]["pass"].value;
  var z = document.forms["myform"]["rpass"].value;
  var h =document.forms["myform"]["contact"].value;
  var i =document.forms["myform"]["email"].value;
  var k = document.forms["myform"]["address"].value;


  if (g=="")
  {
    window.alert("First Enter Your First Name");
  }
  if (x=="")
  {
    window.alert("You Must Enter Your Last Name");
  }
  if (y=="")
  {
    window.alert("You Must Enter Password");
  }
  else if(y.length>8||y.length<32)
  {
    window.alert("Your Password must remian 8 to 32 numbers");
  }
  if (z=="")
  {
    window.alert("You Must Enter Your password Again");
  }

  if (h=="")
  {
    window.alert("Enter Your Contact Number");
  }
  if (i=="")
  {
    window.alert("Enter Your Email");
  }
  if (k=="")
 {
  window.alert("Enter Your Address");
  }

}
