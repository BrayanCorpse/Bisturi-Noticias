"use stric"

$(document).ready(function () {

    $('.trumbowyg').trumbowyg({
        // hideButtonTexts: true
    });


        // comprobar la extensión de images

    var form = document.querySelector('.buttomSend')

    form.addEventListener('click', function () {

        var alert_title = document.querySelector(".alert-title")
        var title = document.querySelector('#title').value


        if (title.trim() == null || title.trim().length == 0 ) {

            //habilita mensaje
            alert_title.style.display = "block"

            //agrega color al campo
            var inputNon = document.getElementById("title")
            inputNon.style.borderColor = "rgba(255, 0, 0, 0.479)";

            // return false

        }else{
            alert_title.style.display = "none"

            var inputNon = document.getElementById("title")
            inputNon.style.borderColor = "rgba(29, 197, 29, 0.733)";

            // return true
        }

        if( title.length >= 8){
            var errorTitle = document.querySelector('.errorTitle')
            errorTitle.style.display = "none"
        }





        var category = document.querySelector('#category_id').value
        var alert_cat = document.querySelector(".alert-cat")

        if (category == "") {

            //habilita mensaje
            alert_cat.style.display = "block"

            //agrega color al campo
            var inputcategory_id = document.querySelector(".chosen-single")
            inputcategory_id.style.borderColor = "rgba(255, 0, 0, 0.479)";
        }else{
            //habilita mensaje
            alert_cat.style.display = "none"

            //agrega color al campo
            var inputcategory_id = document.querySelector(".chosen-single")
            inputcategory_id.style.borderColor = "rgba(29, 197, 29, 0.733)";
        }


        var tag = document.querySelector('.inTag').value
        var alert_tag = document.querySelector(".alert-tag")

        if (tag == "") {
          //habilita mensaje
          alert_tag.style.display = "block"

          //agrega color al campo
          var inputTag = document.querySelector(".chosen-choices")
          inputTag.style.borderColor = "rgba(255, 0, 0, 0.479)";

        }else{
          alert_tag.style.display = "none"

          //agrega color al campo
          var inputTag = document.querySelector(".chosen-choices")
          inputTag.style.borderColor = "rgba(29, 197, 29, 0.733)";
        }

        var content = document.querySelector('.trumbowyg-editor').innerHTML
        var alert_cont = document.querySelector('.alert-cont')
        // console.log(content.length < 600);

        if (content.length < 600) {
            //habilita mensaje
            alert_cont.style.display = "block"

            //agrega color al campo
            var inputCont = document.querySelector(".trumbowyg-box")
            inputCont.style.borderColor = "rgba(255, 0, 0, 0.479)";

        }else{
            alert_cont.style.display = "none"

            //agrega color al campo
            var inputCont = document.querySelector(".trumbowyg-box")
            inputCont.style.borderColor = "rgba(29, 197, 29, 0.733)";
        }



            var fileInput = document.getElementById('image')

            // fileInput.addEventListener('focusout', function () {

                var fileInput = document.getElementById('image').value;
                // console.log(fileInput);
                var allowedExtensions = /(.jpg|.jpeg|.png)$/i;

                // console.log(!allowedExtensions.exec(filePath));
                if (!fileInput == null || !fileInput == "" ) {

                    if(!allowedExtensions.exec(fileInput)){
                        document.getElementById('image').value = ""
                        alert('Por favor solo cargue archivos con extenciones .jpeg/ .jpg/ .png/.');
                        return false;
                    }
                }

                console.log(document.getElementById('image').value);
                var alert_img = document.querySelector('.alert-img')
                if (document.getElementById('image').value == "") {

                    alert_img.style.display = "block"

                    //agrega color al campo
                    var inputImg = document.querySelector(".imageuploadify")
                    inputImg.style.borderColor = "rgba(255, 0, 0, 0.479)";
                }


            // })




    })




});
