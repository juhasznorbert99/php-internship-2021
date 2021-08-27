console.log('loading this script');

$(document).ready(function () {
    console.log("ready!");
});


$(".add-cart-button").click(function (event) {
    console.log(event.target.id);
    $.ajax({
        url: "add-product.php",
        type: "GET",
        data: {"id": event.target.id},
        datatype: "json",
        success: function (data) {
            //console.log(JSON.parse(data));
            location.reload();
        }
    });
});

$("#cart-page").click(function () {
    location.href = 'http://norbi.local/test-controller/cart';
});

$(".increase").click(function (event) {
    const increase = event.target.id.split("-");
    let text = $("#card-id-" + increase[1]).text();
    let split_text = text.split(": ");
    let nr = parseInt(split_text[1], 10) + 1;
    $("#card-id-" + increase[1]).text(split_text[0] + ": " + nr);
});
$(".decrease").click(function (event) {
    const increase = event.target.id.split("-");
    let text = $("#card-id-" + increase[1]).text();
    let split_text = text.split(": ");
    let nr = parseInt(split_text[1], 10) - 1;
    if (nr <= 0)
        nr = 0;
    $("#card-id-" + increase[1]).text(split_text[0] + ": " + nr);
});
$(".delete").click(function (event) {
    const increase = event.target.id.split("-");
    $("#card-id-" + increase[1]).text("Total items: 0");
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

$("#buy").click(function (event) {
    //send data like: item id and quantity
    let indexes = [];
    let quantities = [];
    let aux = $(".total");
    for (let i = 0; i < aux.length; i++) {
        let text = aux[i].innerText;
        let index = aux[i].id;
        quantities.push(text.split(": ")[1]);
        indexes.push(index.split("-")[2]);
    }
    event.preventDefault();
    event.stopPropagation();
    let email = $("#buyer-email").val();

    // console.log(indexes);
    // console.log(quantities);
    // console.log(email);
    if (isEmail(email)) {
        $.ajax({
            url: "/submit-cart.php",
            type: "POST",
            data: {
                "id": indexes,
                "quantity": quantities,
                "email": email
            },
            datatype: "application/json",
            success: function (data) {
                //return false;
                //location.reload();
                window.location.replace("http://norbi.local/test-controller");
            },
            error: function (data) {

            }
        });
    }
    return false;
});


$("#select-users-created").click(function () {
    location.href = 'http://norbi.local/test-controller/users';
});
$("#select-login").click(function () {
    location.href = 'http://norbi.local/test-controller/login';
});
$("#select-register").click(function () {
    location.href = 'http://norbi.local/test-controller/register';
});