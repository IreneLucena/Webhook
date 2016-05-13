/**
 * Created by trainee on 12/05/2016.
 */

var count=0;
var count=$('input[name=status]:checked').length;
if (count.length === 0){
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "select.php",
            dataType: "html",
            success: function(response){
                $(".maximo").html(response);
            }
        });
    });
}
//Pintar checkbox categoria
$(document).ready(function() {
    $.ajax({
        type: "post",
        url: "drawCat.php",
        dataType: "json",
        success: function(response){
            var data=(response);
            var text="";
            var text2="";
            console.log(data);
            console.log(data.length);

            //var dataArray=splitString(data,",");
            for (var c = 0; c < data.length; c++) {
                text='<div class="catDiv"><input type="checkbox" id="categoryC" class="filterC" name="category" value="' + data[c] + '"><label for="categoryC">' + data[c] + '</label></div>';
                text2='<div class="checkCategory" value="' + data[c] + '" name="checkCategory">' + data[c] + '</div>';
                $(".filterCategory").append(text);
                $(".chooseCategory").append(text2);
            }
        }
    });
});
//Filtro de estado
$("body").on("change", 'input[name="status"], input[name="category"]', function(){
    var statusC=[];
    $(".containerOfCandidates").html("");
    $('input[name="status"]:checked').each(function() {
        statusC.push($(this).attr('value'));
    });
    var categoryC=[];
    $('input[name="category"]:checked').each(function() {
        categoryC.push($(this).attr('value'));
    });
    var categoryJoin=categoryC.join(",");
    var statusJoin=statusC.join(",");
    console.log("Filtrado : "+statusJoin+" / "+categoryJoin);
    $.ajax({
        type: "post",
        url: "list.php",
        dataType: "json",
        data: {status: statusJoin, category: categoryJoin},
        success: function(response) {
            var data = (response);
            console.log("Estos son nuestros candidatos : "+data.length);
            for (var c = 0; c < data.length; c++) {
                var text = "";
                text = '<div class="accordion"><div class="accordion-section-title">' + data[c].name + '<input type="checkbox" class="checkBoxToGiveCat" name="' + data[c].id + '"/></div>' +
                    '<div class="accordion-section-content"><div class="firstContainer"><div class="date"><p>Fecha de alta : </br><span class="dateC">' + data[c].dateC + '</span></p></div>' +
                    '<div class="category" id="' + data[c].category + '">Categor&iacutea : ' + data[c].category + '</div>' +
                    '<div class="candidateStatus" id="' + data[c].status + '" value="' + data[c].status + '">Estado : ' + data[c].status + '</div>' +
                    '<div class="message"><p>Leer mensaje</p><div class="cuerpoMensaje"><p> Asunto : ' + data[c].subject + '</p><p>Cuerpo : ' + data[c].body + '</p></div></div></div>'+
                    '<div class="secondContainer"><p>Archivos: </p></div>' +
                    '<div class="thirdContainer"><input type="button" name="Aceptar" class="button" id=' + data[c].id + ' value="Aceptar" onclick="aceptar(' + data[c].id + ')"/>' +
                    '<input type="button" name="Rechazar" class="button" id=' + data[c].id + ' value="Rechazar" onclick="rechazar(' + data[c].id + ')" />' +
                    '</div></div></div>';
                $(".containerOfCandidates").append(text);

            }
        }
    });
})

$("#checkAll").click(function(){
    $('.checkBoxToGiveCat').not(this).prop('checked', this.checked);
});
function aceptar(id) {
    $.ajax({
        url: "update.php",
        type: "POST",
        data: {
            id : id,
            name : "aceptar"
        },
        success: function () {
            alert("Aceptando candidato...");
            setTimeout(function()
            {
                location.reload();
            }, 500);
        }
    });
}
function rechazar(id) {
    $.ajax({
        url: "update.php",
        type: "POST",
        data: {
            id : id,
            name : "rechazar"
        },
        success: function () {
            alert("Rechazando candidato...");
            setTimeout(function()
            {
                location.reload();
            }, 500);
        }
    });
}

$("body").on("click", 'div[name="checkCategory"] , input[name="buttonCat"]', function(){
    var candidates=[];
    var category=($(this).attr('value'));
    var categoryNew=$('.createCatText').val();
    $('input[class="checkBoxToGiveCat"]:checked').each(function() {
        candidates.push($(this).attr('name'));
    });
    var id=candidates.join(",");
    $.ajax({
        url: "update.php",
        type: "POST",
        data: {
            id: id,
            category: category,
            categoryNew: categoryNew
        },
        success: function () {
            alert("Actualizando candidatos...");
            setTimeout(function () {
                location.reload();
            }, 500);
        }
    });
});
