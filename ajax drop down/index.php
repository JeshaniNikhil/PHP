<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
   <div id="main">
    <div id="header">
        <h1>dynamic depended select box in php & ajax jquery</h1>
    </div>
    <div id="content">
        <form action="">
<label>country:<label>
    <select name="" id="country">
        <option value="">Select Country</option>
    </select>
    <select name="" id="state">
        <option value="">Select state</option>
    </select>
    <select name="" id="city">
        <option value="">Select city</option>
    </select>
        </form>
    </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
 <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
 <script>
    $(document).ready(function()
    {
        function loaddata(type,country_id)
        {
            $.ajax({
                url : "load-cs.php",
                type : "POST",
                data: {type:type,id:country_id},
                success : function(data){
                    if(type == "stateData")
                    {
                        $("#state").html(data);
                    }
                    else if(type=="citydata")
                    {
                        $("#city").html(data);
                    }
                    {
                    $("#country").append(data);
                    }
                }
            })
        }
        loaddata();
        $("#country").on("change",function(){
            var country =$("#country").val();
            if(country != "")
            {
            loaddata("stateData",country);
            }
            else
            {
                $("#state").html("");
            }
        })
            $("#state").on("change",function(){
            var state =$("#state").val();
            if(state  != "")
            {
            loaddata("citydata",state);
            }
            else
            {
                $("#city").html("");
            }
        })
    })
 </script>
</body>
</html>