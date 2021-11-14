var korzinka = {

    } //basket
function initial() {
    $.getJSON("korzinka.json", goodsOut);
}

function goodsOut(data) {
    //output to page

    console.log(data) // massive
    var out = '';
    for (var key in data) {
        out += '<div class="korzinka">';
        out += '<p class="name">' + data[key].name + '</p>';
        out += '<img src="images/' + data[key].img + '" width="128" height="128" alt="photo">';
        out += '<div class="cost">' + data[key].cost + '</div>';
        out += '<button class="add-to-korzinka" data-id=' + key + '>Выбрать</button>';
        out += '</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-korzinka').on('click', addTokorzinka);
}

function addTokorzinka() {
    //add product to korzinka
    var id = $(this).attr('data-id');
    // console.log(id);
    if (korzinka[id] == undefined) {
        korzinka[id] = 1;
    } else {
        korzinka[id]++;
    }
    showkorzinka();
    basket();
}

function basket() {
    //Saves the basket with parameters to the browser local storage
    localStorage.setItem('korzinka', JSON.stringify(korzinka)); //change korzinka options from object to row
}

function showkorzinka() {
    var out = "";
    for (var key in korzinka) {
        out += key + ' x ' + korzinka[key] + '<br>';
    }
    $('.mini-korzinka').html(out);
}

function loadkorzinka() {
    //check if there is a date in local storage "korzinka"
    if (localStorage.getItem('korzinka')) {
        korzinka = JSON.parse(localStorage.getItem('korzinka')) //if there is, write to this variable 
        showkorzinka();
    }
}

$(document).ready(function() {
    initial();
    loadkorzinka();
})