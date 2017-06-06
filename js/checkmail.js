
var messages = 0;        
var audio = new Audio('sounds/base.mp3');
$(function(){
    function refreshDiv(){
        $.ajax({
            url: 'checkmail.php'
        }).done(function(result) {
            var notify;
            notify = result.replace("true", "");
            if (notify != result)
            {
                result = notify;
                notify = true;
            }
            else
            {
                notify = result.replace("false", "");
                result = notify;
                notify = false;
            }
            if (messages != result)
            {
                if (notify == true)
                {
                    if (result != 0)
                    {
                        audio.play();
                    }
                }
                messages = result;
            }
            $('#msgs').text("("+result+")");
            window.setTimeout(refreshDiv, 5000);
        });

    }
    window.setTimeout(refreshDiv, 1000);
});