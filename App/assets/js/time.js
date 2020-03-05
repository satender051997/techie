function startTime() {
    var today = new Date();
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";
    var n = month[today.getMonth()];
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var date = today.getDate()+'-'+n+'-'+today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    t = "Time"
    document.getElementById('show_time').innerHTML = t +": "+ h + ":" + m + ":" + s  ;
    document.getElementById('show_date').innerHTML = date;
    var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }

  // it focuses on very first field of form
  window.addEventListener("load", function() {
    $('#cname').focus(); 
  });
  
 
  // **validation for name
  function name_Validate() {
    var cname = document.getElementById("cname").value;
    var letter = /^[A-Z a-z]+$/;
    if(cname.match(letter))  
    {
     document.getElementById("cname_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("cname_msg").innerHTML="Please fill the valid aphabetical character!!!";
      document.getElementById("cname").focus();
    }
  }

  // **validation for mobile number
  function number_Validate() {
    var cmobile = document.getElementById("mob").value;
    var letter = /^[0][1-9]\d{9}$|^[1-9]\d{9}$/;
    if(cmobile.match(letter))  
    {
     document.getElementById("cmobile_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("cmobile_msg").innerHTML="Invalid Mobile no entered limit 10";
      document.getElementById("mob").focus();
    }
  }

   // **validation for email 
   function email_Validate() {
    var c_email = document.getElementById("email").value;
    var letter = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if(c_email.match(letter))  
    {
     document.getElementById("c_email_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("c_email_msg").innerHTML="Invalid Email";
      document.getElementById("email").focus();
    }
  }
   // **validation for customer town
   function town_Validate() {
    var cTown = document.getElementById("town").value;
    var letter = /^[A-Z a-z]+$/;
    if(cTown.match(letter))  
    {
     document.getElementById("cTown_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("cTown_msg").innerHTML="Town name should be in alphabetical manner";
      document.getElementById("town").focus();
    }
  }

  // **validation for country
  function country_Validate() {
    var country = document.getElementById("country").value;
    var letter = /^[A-Z a-z]+$/;
    if(country.match(letter))  
    {
     document.getElementById("country_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("country_msg").innerHTML="Country name should be in alphabetical manner";
      document.getElementById("country").focus();
    }
  }

  // function empty_field_Validate() {
  //   var cname = document.getElementById("cname").value;
  //   var cmobile = document.getElementById("mob").value;
  //   var c_email = document.getElementById("email").value;
  //   var cTown = document.getElementById("town").value;
  //   var country = document.getElementById("country").value;
  //   var house1 = document.getElementById("house").value;
  //   if(cname==""||cmobile==""||c_email==""||cTown==""||country==""||house1=="")
  //   {
  //     document.getElementById("empty_msg").innerHTML="No field should left empty!!!";
  //     return false; 
  //   }
  // }
  

  function product_Validate() {
  var product = document.getElementById("product").value;
   
     if (product == "")
      { 
        document.getElementById("product_msg").innerHTML="Please enter product name";
        document.getElementById("product").focus();
        return false;
      }
      else 
      {
        document.getElementById("product_msg").innerHTML="";
        return true;
      }
    }

  function qty_Validate() {
    var qty = document.getElementById("qty").value;
    if(qty=="")  
    {
     document.getElementById("qty_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("qty_msg").innerHTML="Please enter product name";
      document.getElementById("qty").focus();
    }
  }


  function price_Validate(){
    var price = document.getElementById("price").value;
    if(price=="")  
    {
     document.getElementById("price_msg").innerHTML="";
    }
    else 
    {
      document.getElementById("price_msg").innerHTML="Invalid Mobile no entered limit 10";
      document.getElementById("price").focus();
    }
  }