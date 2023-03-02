<?php
echo "camera send<br>";

?>
<meta http-equiv="refresh" content="10">
<style>
    .image {
    position:relative;
}
.image .text {
    position:absolute;
    top:10px;
    left:10px;
    width:300px;
}
</style>
<canvas id="myCanvas" width="640px" height="480px">
canvas displays 1.
</canvas>
<canvas id="myCanvas2" width="640px" height="480px">
canvas displays 2.
</canvas>
<img src="" style="width: 640px;; height:480px; padding-top: 10px" alt="" id="canvas3">
<script> 
var dataURL="";
var canvas = document.getElementById("myCanvas");
    window.onload = function(){
     
     var context = canvas.getContext("2d");
     var imageObj = new Image();
    
     imageObj.onload = function(){
        const date = new Date();
        const currentYear = date.getFullYear();
        const currentMonth = date.getMonth() + 1; 
     
        const cday = date.getDate();

        var strm = "";
        if(currentMonth<10)
        {
            strm="0"+currentMonth.toString();
        }
        else
        {
            strm=currentMonth.toString();
        }
        var strd="";
        if(cday<10)
        {
            strd="0"+cday.toString();
        }
        else
        {
            strd=cday.toString();
        }
        var hh = date.getHours();
        var mm = date.getMinutes();
        var ss = date.getSeconds();
        var ms = date.getMilliseconds();

        var hhh="";
        var mmm="";
        var sss="";
        var mss="";

        mss = ms.toString();
        if(hh<10)
        {
            hhh="0"+hh.toString();
        }
        else
        {
            hhh=hh.toString();
        }
        if(mm<10)
        {
            mmm="0"+mm.toString();
        }
        else
        {
            mmm=mm.toString();
        }
        if(ss<10)
        {
            sss="0"+ss.toString();
        }
        else
        {
            sss=ss.toString();
        }


        let time = hhh + ":" + mmm + ":" + sss;
         context.drawImage(imageObj, 10, 10,canvas.width, canvas.height);
         context.font = "10pt Calibri";
         context.beginPath();
         context.fillStyle = "#FFffff";
         context.globalAlpha = 0.5;
         context.fillRect(22, 460, 110, 12);
         context.globalAlpha = 1;
         context.fillStyle = "#000000";
         context.stroke();
         context.fillText(currentYear+":"+strm+":"+strd+" "+time+" น.", 20, 470);
         dataURL = canvas.toDataURL("image/webp", 0.3);
        var canvas3 = document.getElementById('canvas3');
        canvas3.src= dataURL;
        console.log(dataURL);

        var http = new XMLHttpRequest();
        var url = 'dbserv.php';
        var params = 'time='+currentYear+":"+strm+":"+strd+" "+time+":"+mss+'&token=camera1'+'&data='+dataURL;
        http.open('POST', url, true);

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
        //alert(http.responseText);
        }
        }
        http.send(params);
     };
     imageObj.src = "480p.webp"; 

    


};


/*
function toDataURL(src, callback, outputFormat) {
  let image = new Image();
  image.crossOrigin = 'Anonymous';
  image.onload = function () {
    let canvas = document.createElement('canvas');
    let ctx = canvas.getContext('2d');
    let dataURL;
    canvas.height = this.naturalHeight;
    canvas.width = this.naturalWidth;
    ctx.drawImage(this, 0, 0);
    dataURL = canvas.toDataURL(outputFormat);
    callback(dataURL);
  };
  image.src = src;
  if (image.complete || image.complete === undefined) {
    image.src = "data:image/gif;base64, R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
    image.src = src;
  }
}
 
toDataURL('https://www.gravatar.com/avatar/0c6523b4d3f60hj548962bfrg2350',
  function (dataUrl) {
    console.log('RESULT:', dataUrl)
    /*var canvas2 = document.getElementById('myCanvas2');
    var context2 = canvas2.getContext('2d');
    var img2 = new Image();

    img2.onload = function() {
        context2.drawImage(this, 0, 0, canvas2.width, canvas2.height);
    }
    img2.src= dataUrl;
  }
)*/
</script>
</html>