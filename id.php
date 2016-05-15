<?php
require_once 'lib/save-signature.php';


?>


<script  type="text/javascript" src="jquery.js"></script>
<script  type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jq.js"></script>

<script type='text/javascript' src='solvedabcd.js'> </script>
<!--<script type='text/javascript' src='solved3abcd.js'> </script>-->
<style>
.Large
{
    font-size: 16pt;
    height: 50px;
}

input[type=radio] { 
transform: scale(2, 2); 
-moz-transform: scale(2, 2); 
-ms-transform: scale(2, 2); 
-webkit-transform: scale(2, 2); 
-o-transform: scale(2, 2); 
}

</style>
<script language="JavaScript" type='text/javascript'>
//textboxes not allowed only firstname is accepted
function keyDown() {
alert("You are not allowed!");
return false;
}

//when button is clicked
function ajax_post(){
	//makes sure that image is taken first
	var count =0;
	var count = 1;// makes sure that the count os 1 or 0 
	//alert (count);
	if(count == 1) {
					/*
					var selected_index = schform.elements["country"].selectedIndex;
							if(selected_index > 0)
								{
									var selected_option_value = schform.elements["country"].options[selected_index].value;
									var selected_option_text = schform.elements["country"].options[selected_index].text;
									//alert(selected_option_text);
								}
							else
								{
									//alert('Please select a country from the drop down list');
									//return false;
								}
*/
/*alert(selected_option_value) 	
alert("anafa its working") 	
alert(selected_option_text)*/
	
	//check for the radio button selected
						var test = document.getElementsByName("radio");
							for (i = 0; i < test.length; i++) {
								if (test[i].checked)
									var parameter=test[i].value;
							
							//alert(parameter);
									}
 //ajax instance
	var http = new XMLHttpRequest();
	var url = "itsdonwork.php";
	var reg = document.getElementById("registrationno").value  //agfn => matric no
	var dept = document.getElementById("dept").value  //agsal => department
	var co = document.getElementById("course").value  //agtel => course
	var fn = document.getElementById("fullname").value //agid => fullname
	//var mat = document.getElementById("mat").value //agid => fullname
	var prog = document.getElementById("prog").value //agid => fullname
	var sess = document.getElementById("sess").value //agid => fullname
	var z1 = parameter

//alert (z2);
/*
	var z2 = document.getElementById("check1").value
	var z3 = document.getElementById("check2").value
	var z4 = document.getElementById("RadioGroup1").value
	
	
	*/
	
	//alert(rn, ln, mn, fn);
	
//	sends  the variables to php
	var vars = "matricno="+reg+"&dept="+dept+"&course="+co+"&fullname="+fn+"&prog="+prog+"&sess="+sess+"&bloodgp="+z1;
	/*+"&check1="+z2+"&check2="+z3+"&RadioGroup1="+z4^*/
	//prints out put to be sure what is input is correct
//alert(vars);exit;
	
//alert('MOVE');
	http.open("POST", url, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			var return_data = http.responseText;

document.getElementById("header").innerHTML = return_data;
	
			}
		
		}
http.send(vars);
document.getElementById("header").innerHTML = "processing...";

document.getElementById("displayCount").innerHTML = 0;

var now = document.getElementById("displayCount").innerHTML;

//alert(now);

}else{
	alert("Take Snapshot first");
}


}



</script>
<script language="JavaScript" type='text/javascript'>
//reset the form including textbox etc
function submit_form(){
/*	var f = document.form.schform;
	f.onsubmit = function(){
	setTimeout(f.reset,10);
	}
	*/
	document.schform.reset();
	
	//document.schform.submit() = function(){setTimeout(	document.schform.reset,100);//
	}
	
</script>


<link rel="stylesheet" type="text/css" href="solvedabc.css" />

<div id="wrapper">

  		<div id="header">WELCOME TO ID CARD UNIT</div>
  
<div id="content">
    							<div id="content-left">
                                    <p><a href="#">Home</a></p>
<p><a href="/health/main3.html">ID Card Process</a></p>
                                  <p><a href="#">Print</a></p>


                                    <p><a href="#"></a></p>


                                    <p><a href="/health/print_out.php"></a></p>


             
                                
                                </div>
        
											<div id="content-main">
											<form name="schform" form action="">
											<table>
											<tr>
											<td width="124" class ="great">Serial No:</td>
											<td width="142">
											<input id="registrationno" type="text" name="registrationno" class="Large"  "placeholder ="" autofocus ></td>
                                            </tr>
                                            <tr>
                                              <td class ="great">Full Name:</td>
                                              <td><input id="fullname" type="text" name="fullname" class="Large" onKeyDown = "keydown()"  placeholder ="" /></td>
                                            </tr>
                                            <tr>
                                              <td class ="great">Rank:</td>
                                              <td><input id="course" type="text" name="course" class="Large" onKeyDown = "keydown()" placeholder =""/></td>
                                            </tr>
                                            <tr>
                                              <td class ="great">Department:</td>
                                              <td><input id="dept" type="text" name="dept" class="Large" onKeyDown = "keydown()" placeholder =""/></td>
                                            </tr>
											<!----tr>
                                              <td class ="great">Matric No:</td>
                                              <td><input id="mat" type="text" class="Large" name="mat" </td>
                                            </tr---->
											<input type="hidden" name="prog" id="prog">
											<input type="hidden" name="sess" id="sess" value="<?php echo $_SESSION["myvalue"]; ?>">
											
                                            <tr>
                                              <td class ="great">Blood Group</td>
                                              <td><input type="radio" name="radio" id="breakfast" value="O+" />
                                              <label for="breakfast"> O+ 
                                              </label>
                                               <input type="radio" name="radio" value="A+" id = "lunch">
												 <label for = "lunch"> A+  </label>
												
												<input type="radio" name="radio" value="AB+" id = "dinner">
												 <label for = "dinner"> AB+ </label>
												 <br /><br />
												 <input type="radio" name="radio" value="B+" id = "dinner">
												 <label for = "love"> B+ </label>
												 <input type="radio" name="radio" value="O-" id = "dinner">
												 <label for = "grace"> O- </label>
												 <input type="radio" name="radio" value="A-" id = "dinner">
												 <label for = "riteous"> A- </label>
												 <br /><br />
												 <input type="radio" name="radio" value="AB-" id = "dinner">
												 <label for = "undead"> AB- </label>
												
												<br/><br/><br/>
                                              
                                              </td>
                                            </tr>
											<tr>
                                              <td><input type="reset" value="Clear" style="width:100px; height:50px;"></td>
                                              <td> <div align="center">
                                                <input type="button" name="send" id="send" value="Submit Data" style="width:150px; height:50px; "onClick="javascript:ajax_post(), submit_form()"; />
                                              </div></td>
                                            </tr>
                                            </table>
                                       </form>
                                </div>


                                <!--webcam things only -->


                                <div id="content-right">
                                                    
<!--Insert Signature codes-->
<head>
	<title>SignaturePanel - Generating images on the server</title>
    <!--[if lt IE 9]><script type="text/javascript" src="excanvas.compiled.js"></script><![endif]-->
    <script src="jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="jquery.signature-panel.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.signature-panel.css" />


    <script type="text/javascript">

        function signatureOK(signatureData) {
            // Send the signature to the server and generate an image file.
            $.ajax({
                url:"process_signature.php",
                type:"POST",
                data:JSON.stringify(signatureData),
                contentType:"application/json; charset=utf-8",
                dataType:"text",
                success: function(data, textStatus, jqXHR){
                    $("#latest-signature").attr("src", data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
            $("#my-panel").signaturePanel("clear");
        }

        function signatureCancel() {
           // alert("You clicked Cancel.");
        }

        $(document).ready(function() {
            $("#my-panel").signaturePanel({
                okCallback: signatureOK,
                //cancelCallback: signatureCancel
            });
        });

    </script>

<form action="/health/main3.html">
    <input type="submit" value="ID Card Process">
</form>

</head>
<body>
       <div id="my-panel" style="width: 400px; height: 200px; border: 5px solid gray"></div>
   
</body>



</div> 
                                         
                             
                             
                             
  				</div>
  
 		 <div id="footer"><div id="upload_results" style="background-color:#eee;"></div></div>
  	
    <div id="bottom"><a title="MudiWorks" href="#"></a></div>

<p>The button was pressed <span id="displayCount">0</span> times.</p>

<br /> <br />
<div id="header"></div>

