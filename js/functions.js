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

    $("#formAddPost").submit(function(event){
        var error = false;
        var errorTitle = $('#errorTitle');
        var errorContent = $('#errorContent');
        var errorFile = $('#errorFile');
        var errorByAuthor = $('#errorByAuthor');

        errorTitle.text("");
        errorContent.text("");
        errorFile.text("");
        errorByAuthor.text("");

        var title = $('#title').val();
        var content = $('#content').val();
        var byAuthor = $('#byAuthor').val();
        var fileType = $('#data').val().split('\\').pop().split('.').pop();

        if(title=="") {
            errorTitle.text("Это поле обезательное к заполнению!");
            error=true;
        }
        if(content==""){
            errorContent.text("Это поле обезательное к заполнению!");
            error=true;
        }
        if(fileType==""){
            errorFile.text("Изображение не выбрано!");
            error=true;
        }
        if(fileType!="jpg" && fileType!="png" && fileType!="jpeg" && fileType!="gif" && fileType!=""){
            errorFile.text("Формат файла должен быть jpg,png,jpeg,gif!");
            error=true;
        }
        if(byAuthor==""){
            errorByAuthor.text("Это поле обезательное к заполнению!");
            error=true;
        }
        if(error){
            event.preventDefault();
        }
    });


});
