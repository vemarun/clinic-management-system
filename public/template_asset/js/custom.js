(function ($) {
    "use strict"; // Start of use strict
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    /*Loader Javascript
    -------------------*/
    var window_var = $(window);
    window_var.on('load', function () {
        $(".loading").fadeOut("fast");
        $("#snackbar").addClass("show");
    });
    // scroll to top
    $(window).on('scroll',function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').on('click',function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    // scroll to top End

    // fullscreen function
    $(".fullscreen").on('click', function(){
        if(document.webkitCurrentFullScreenElement==null){
            document.documentElement.webkitRequestFullScreen();
        }else{
            document.webkitCancelFullScreen();   
        }
    }); 
     // fullscreen function End
	 
	 //datatable js
    // $('.example').DataTable({
    //   dom: '<"col-3"l><"col-5"B><"col-4"f>rt<"col-6"i><"col-6"p>',
    //     buttons: [
    //          'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });

    //Multi Select 

 
    $(function() {
        $('.test').fSelect();
    });

})(jQuery);


     // Mobile validation with atleast 10 digit phone number

    function isNumberKey(evt)
    {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
    }



    //Alphanumeric

    function IsAlphaNumeric(e) {
            
                var specialKeys = new Array();
                specialKeys.push(8); //Backspace
                specialKeys.push(9); //Tab
                specialKeys.push(46); //Delete
                specialKeys.push(36); //Home
                specialKeys.push(35); //End
                specialKeys.push(37); //Left
                specialKeys.push(39); //Right

                var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || keyCode == 32 || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                // document.getElementById("error").style.display = ret ? "none" : "inline";
                return ret;
            }


        function isFloatNumber(e) {
                
                    var specialKeys = new Array();
                    specialKeys.push(8); //Backspace
                    specialKeys.push(9); //Tab
                    specialKeys.push(46); //Delete
                    specialKeys.push(36); //Home
                    specialKeys.push(35); //End
                    specialKeys.push(37); //Left
                    specialKeys.push(39); //Right

                    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                    var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || keyCode == 32 || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                    // document.getElementById("error").style.display = ret ? "none" : "inline";
                    return ret;
                }     
        function validCheck(e) {
                    var keyCode = (e.which) ? e.which : e.keyCode;
                    if ((keyCode >= 48 && keyCode <= 57) || (keyCode == 8))
                        return true;
                    else if (keyCode == 46) {
                        var curVal = document.activeElement.value;
                        if (curVal != null && curVal.trim().indexOf('.') == -1)
                            return true;
                        else
                            return false;
                    }
                    else
                        return false;
                }


                     









