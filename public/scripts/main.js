console.log('loading this script');

$(document).ready(function() {
    console.log("ready!");
});


$(".add-cart-button").click(function(event){
   console.log(event.target.id);
   $.ajax({
        url: "add-product.php",
        type: "GET",
        data: {"id":event.target.id},
        datatype: "json",
        success: function(data){
            //console.log(JSON.parse(data));
            location.reload();
        }
   });
});

$("#cart-page").click(function (){
    location.href = 'http://norbi.local/test-controller/cart';
});

$(".increase").click(function (event){
    const increase = event.target.id.split("-");
    let text = $("#card-id-"+increase[1]).text();
    let split_text = text.split(": ");
    let nr = parseInt(split_text[1], 10)+1;
    $("#card-id-"+increase[1]).text(split_text[0] + ": "+nr);
});
$(".decrease").click(function (event){
    const increase = event.target.id.split("-");
    let text = $("#card-id-"+increase[1]).text();
    let split_text = text.split(": ");
    let nr = parseInt(split_text[1], 10)-1;
    if(nr<=0)
        nr=0;
    $("#card-id-"+increase[1]).text(split_text[0] + ": "+nr);
});
$(".delete").click(function (event){
    const increase = event.target.id.split("-");
    $("#card-id-"+increase[1]).text("Total items: 0");
});

$("#buy").click(function (){
    $.ajax({
        url: "add-product.php",
        type: "GET",
        data: {"id":event.target.id},
        datatype: "json",
        success: function(data){
            //console.log(JSON.parse(data));
            location.reload();
        }
    });
});