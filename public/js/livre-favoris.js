// On verifie s'il y a des boutons d'ajout en favori dans le DOM 
if($(".bt-favori").length > 0){
    //On leur ajoute un écouteur d'évenement sur le click à l'aide de la méthode jquery on (evenement, callback)
    $(".bt-favori").on("click", function(event){
        event.preventDefault();
        event.stopPropagation();
        var bt = $(this);
        var livreId = $(this).attr("data-livreid"); //$(this) fait référence au bouton ayant déclenché l'évenement
        $.ajax({
            url: '/profile/addfavori',
            type: 'post',
            data:"id="+livreId
        }).done(function(response){
            $(bt).hide();
        }).fail(function(error){
            console.log("ajax error :", error);
        })
    });
}
