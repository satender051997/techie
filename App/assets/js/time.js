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
    var date = today.getDay()+'-'+n+'-'+today.getFullYear();
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


//   show date

