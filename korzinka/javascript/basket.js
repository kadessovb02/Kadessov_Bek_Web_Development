var korzinka = {};

function loadkorzinka() {
    //check if there is a date in local storage "korzinka"
    if (localStorage.getItem('korzinka')) {
        korzinka = JSON.parse(localStorage.getItem('korzinka')) //if there is, write to this variable 
        showkorzinkat();
    } else {
        $('.main-korzinka').html('Корзина пуста!');
    }
}

function showkorzinkat() {

    if (!isEmpty(korzinka)) {
        $('.main-korzinka').html('Корзина пуста!');
    } else {
        $.getJSON('korzinka.json', function(data) {
            var goods = data;
            var out = '';
            for (var key in korzinka) {
                // key is good's ID
                out += '<button data-id="' + key + '" class="delg-goods" style="color:red">x</button>';
                out += '<img src="images/' + data[key].img + '"width="64" height="64">';
                out += ' ' + data[key].name + ' ';
                out += ' ' + korzinka[key] + ' ';
                out += '<br>'
                out += korzinka[key] * goods[key].cost + ' KZT';
                out += '<br>'
            }
            $('.main-korzinka').html(out);
            $('.delg-goods').on('click', delGoods);
        });
    }
}

function delGoods() {
    // delete good in the basket
    var id = $(this).attr('data-id');
    delete korzinka[id];
    basket();
    showkorzinkat();
}

function basket() {
    //Saves the basket with parameters to the browser local storage
    localStorage.setItem('korzinka', JSON.stringify(korzinka)); //change korzinka options from object to row
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}

function sendEmail() {
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename != '' && email != '' && ephone != '') {
        if (isEmpty(korzinka)) {
            $.post(
                "core/mail.php", {
                    "ename": ename,
                    "email": email,
                    "ephone": ephone,
                    "korzinka": korzinka
                },
                function(data) {
                    console.log(data);
                }
            );
        } else {
            alert('Корзина пуста');
        }
    } else {
        alert('Заполните поля');
    }

}


$(document).ready(function() {
    loadkorzinka();
    $('.send-email').on('click', sendEmail); // отправить письмо с заказом
});