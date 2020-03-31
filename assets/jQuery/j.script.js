 $( document ).ready(function() {


    setTimeout(function(){
        $(".alert-notif").fadeOut("slow");
    }, 2000);

    $('.delete-icon-user').click(function()
    {
        return confirm('êtes-vous sûr de vouloir supprimer ');
    });

    $('.delete-comment-icon').click(function()
    {
        return confirm('êtes-vous sûr de vouloir supprimer ');
    });
     /*
    $('.change-role-users').click(function()
    {
       //  $('.wrapper').stop(true,true).fadeIn(22000);  
       $('.alert-notif').css("display","block");

        //$('.alert-notif').alert();

    })*/

});  