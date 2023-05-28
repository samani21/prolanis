<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Document</title>
</head>
<body>
<div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">BAHASA INDONESIA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="b_indo" id="b_ind">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">BAHASA INGGRIS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="b_ing" id=b_ing>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">TOTAL NILAI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="total" id="total" Readonly value="0">
                        </div>
                    </div>   
                    <script type="text/javascript">
                            // $("#b_ind").keyup(function(){   
                            //     var a= String($("#b_ind").val());
                            //         if(a >= 30){
                            //             var i = 'Tidak Terkontrol';
                            //         }else{
                            //             var i = 'Terkontrol'
                            //         }
                            // $("#total").val(i);
                            // });
                            
                            // $("#b_ing").keyup(function(){ 
                            //     var b= String($("#b_ing").val());  
                            //         if(b >= '140/80'){
                            //             var i = 'Tidak Terkontrol';
                            //         }else{
                            //             var i = 'Terkontrol'
                            //         }
                            // $("#total").val(i);
                            // });

                            $("#b_ind").keyup(function(){   
                            var a = parseFloat($("#b_ind").val());
                            var b = parseFloat($("#b_ing").val());
                            var t = b/100;
                            var tb = t*t;
                            var i = a/tb;
                            hasil = i.toFixed(2);
                            $("#total").val(hasil);
                            });

                            $("#b_ing").keyup(function(){   
                            var a = parseFloat($("#b_ind").val());
                            var b = parseFloat($("#b_ing").val());
                            var t = b/100;
                            var tb = t*t;
                            var i = a/tb;   
                            hasil = i.toFixed(2);
                            $("#total").val(hasil);
                            });
                        </script>
</body>
</html>