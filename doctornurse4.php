<!DOCTYPE html>
<html>
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
       <div id="my-panel" style="width: 400px; height: 200px; border: 10px solid gray"></div>
   
</body>
</html>