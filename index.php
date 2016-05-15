<?php

session_start();
$pat_id=$_SESSION["pat_id"];
$isbn = $pat_id;
//unset($_SESSION['pat_id']); 
?>

<!DOCTYPE html>
<html>
<head>
<script language="JavaScript" type='text/javascript'>
//textboxes not allowed only firstname is accepted
function keyDown() {

alert("You are not allowed!");
document.schform.reset();
return false;
}
</script>    

<form method="post" action="index.php" class="sigPad">
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jq.js"></script>

 <input id="id" type="text" name="id" value ='' placeholder ="Type patient no. Here" autofocus >
 
 <input id="name" type="text" name="name" maxlength="23" onKeyDown="keyDown()" />
 <input id="address" type="text" name="address" onKeyDown="keyDown()" />
 <input id="sex" type="text" name="sex" onKeyDown="keyDown()" />
 <input id="occu" type="text" name="occu" onKeyDown="keyDown()" />
 <input id="age" type="text" name="age" onKeyDown="keyDown()" />
<div class="buttonHolder"><input type="reset" value="Clear"></div>
</form>


	<p><a href="<?php echo $isbn ?>.jpg" target="_blank">Anita</a></p>
	
	<p><a href="nur_image.php" target="_blank">Click Here to view nurse report</a></p>
	
	
	<title>SignaturePanel - Generating images on the server</title>
    <!--[if lt IE 9]><script type="text/javascript" src="excanvas.compiled.js"></script><![endif]-->
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
            alert("You clicked Cancel.");
        }

        $(document).ready(function() {
            $("#my-panel").signaturePanel({
                okCallback: signatureOK,
                cancelCallback: signatureCancel
            });
        });

    </script>

</head>
<body>
    <h1>Generating images on the server</h1>
    <h2>Sign your name below</h2>
    <div id="my-panel" style="width: 700px; height: 1000px; border: 10px solid gray"></div>
    <h2>Here is your latest signature</h2>
    <img id="latest-signature" style="border: 1px solid gray" src=""/>
</body>
</html>