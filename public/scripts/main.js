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