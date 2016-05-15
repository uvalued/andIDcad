$(document).ready(function(){
    $('a').on('click',function(){
        var aID = $(this).attr('href');
        var elem = $(''+aID).html();
        
        $('.target').html(elem);
    });
});