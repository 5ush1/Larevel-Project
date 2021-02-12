// ".klasa", "#id", "div"
// $(document).ready(function() {});

$(document).ready(function () {

    var proizvodi = ["Jogurt", "Mleko"];

    var detaljiProizvoda = {
        "Jogrt" : {
            "cena": 500
        }
    };

    for(proizvod in proizvodi)
    {
        // 0, 1
        console.log( proizvodi[proizvod] )
    }

    $('._addProduct').click(function (event){
        var ime = $('#name').val();
        var cena = $('#price').val();
        var kolicina = $('#amount').val();


        $.ajax({
            url: '/api/product/new',
            method: 'POST',
            data: {
                name: ime,
                price: cena,
                amount: kolicina
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response){
                if(response['success'])
                {
                    alert("Uspesno ste dodali novi proizvod")
                }
            }
        });


        event.preventDefault();
    });

    $('.clickable_text').click(function (){
        $(this).css('color', 'red');
    });
    $('._submit').click(function (event) {
        $(this).css('backgroundColor', 'blue');
        var text = $('._input').val();
        console.log(text);
        event.preventDefault();
    });
    $('._deleteProduct').click(function () {
        var id = $(this).attr('data-product-id');
        var element = $(this);
        if (!$.isNumeric(id)){
            return false;
        }
        $.ajax({
            url : '/admin/delete_product/'+id,
            success: function(response) {
                $(element).parent().parent().hide();
            }
        });
    });





});
