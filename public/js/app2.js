



$(document).ready(function(){

    $("#boton").click(function(){
      $("#panel").slideToggle(200);
    });



const arrText = document.querySelectorAll('.description-1')

var description = document.querySelectorAll('.description')



// console.log(arrText);

    for (let index = 0; index < arrText.length; index++) {

        // console.log(arrText[index].innerHTML);

        var content = arrText[index].innerHTML

        var  textClear = content.trim()
        var  textDiv = textClear.split(" ", 60)

        const arr1 = [". . . ."]

        textDiv.push(arr1)

        var result = textDiv.toString()

            result = result.replace(/,/g," ")
            console.log(result);

            description[index].innerHTML = ( result )
    }



});

