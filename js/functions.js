$(document).ready(function(){
    $("#comments").submit(function(event){
        var errorName = $('#errorName');
        var errorComment = $('#errorComment');
        errorName.text("");
        errorComment.text("");
        var name = $('#name').val();
        var comment = $('#comment').val();
        if(name=="" && comment=="") {

            errorName.text("Это поле обезательное к заполнению!");
            errorComment.text("Это поле обезательное к заполнению!");
            event.preventDefault();
        }
        if(name==""){

            errorName.text("Это поле обезательное к заполнению!");
            event.preventDefault();

        }
        if(comment==""){

            errorComment.text("Это поле обезательное к заполнению!");
            event.preventDefault();
        }
    });

});
