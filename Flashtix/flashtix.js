$(function() {
    $.mobile.pushStateEnabled = 'Welkom!';
    //var welkomstMelding = 'Welkom!';
    //$('#homecontent').prepend('<p class="melding">' + welkomstMelding + '</p>');
    //$('#homecontent').append('<p class="gratis">Gratis tickets!</p>');
    //$('#homecontent').children('.gratis').remove();
    //$('body').bind('swipe', function(event) {alert('Did You Just Fucking Swipe On Me?');});
    //$('body').bind('click', function(e) {alert('Page coordinaten: ' + e.pageX + ' ' + e.pageY);});

    //$('body').unbind('click');
    //$('body').unbind('swipe');

    $('body').taphold(function() {
        datum = new Date();
        uur = datum.getHours();
        if(uur <= 11) {
            $('<p>Goedemorgen!</p>').prependTo('#homecontent');
        } else if(uur>=12 && uur<=17) {
            $('<p>Goedemiddag!</p>').prependTo('#homecontent');
        } else 
            $('<p>Goedenavond!</p>').prependTo('#homecontent');
    });
    $('body').trigger('taphold');

    //$('#lastminutecontent > ul > li > a > img').addClass('ui-corner-all');
    //$('#lastminutecontent > ul > li > a > img').css('border-radius', '50%');

    $('[href="#shakira-biopage"]').append('<p class="melding">Uitverkocht!</p>');
    $('[href="#nora-biopage"]').append('<p class="melding">Nog 10 kaarten !</p>');

    /* 
    let date = new Date();
    if(date.getDay()===6 || date.getDay()===0)
    {
    $('#rock').hide();
    $('#bruce-concert').hide();
    }
    
    $('#jennifer-concert').hide();
    $('#nora-concert').append('<img src="assets/ster.png" width="32" height="32">');
    
    $('#nora-concert').after($('#shakira-concert'));
    
    $('#pop').before($('#jazz'));
    $('#jazz').after($('#nora-concert'));

    $('#lastminutecontent li').each(function () {
        $(this).show();
    });
    */

    $('<img class="poster" src="assets/kylieposter.jpg" alt="pic" width="35%">').insertBefore($('#lastminutecontent>ul'));

    $('#submit').click(function () {
        let email = document.form.email.value;
        let concert = document.form.concert.value;
        console.log("DEBUG: ", concert);
        $.ajax({
            type: 'POST',
            url: 'php/scripts/getEticket.php',
            data: ({
                email: email,
                concert: concert
            }),
            cache: false,
            dataType: "text",
            success: function (data) {
                $('#form').append('<p>E-Ticket voor concert ' + concert + '</p><img src="' + data + '" alt="pic" width="35%">');
                localStorage.setItem(concert, data);
                window.location = "http://localhost/flashtix/#eticketspage";
            }
        });
        $('#log').ajaxError(function (event, request, settings, exception) {
            $('#log').html("Error: " + settings.url + "<br>HTTP Code: " + request.status);
        })
    });

}); // einde jQuery