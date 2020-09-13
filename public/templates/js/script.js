$(document).ready(function(){

    var name_spl = $("#name_supplier");
    var address_spl = $("#address_supplier");
    var phone_num = $("#phone_number");
    var data = [];

    $('#form_add_supplier').on('submit', function(e){

        if( name_spl.val() == '' && address_spl.val() == '' && phone_num.val() == ''){
            e.preventDefault();
            name_spl.addClass("is-invalid");
            address_spl.addClass("is-invalid");
            phone_num.addClass("is-invalid");
        } 

        if( name_spl.val() == '' ){
            e.preventDefault();
            name_spl.addClass("is-invalid");
        } else {
            name_spl.removeClass("is-invalid");
        }
        
        data.forEach(el => {
            console.log(el);
        });

        if( address_spl.val() == '' ){
            e.preventDefault();
            address_spl.addClass("is-invalid");
        } else {
            address_spl.removeClass("is-invalid");
        }
        
        if( phone_num.val() == '' ){
            e.preventDefault();
            phone_num.addClass("is-invalid");
        } else {
            phone_num.removeClass("is-invalid");
        }

        if( phone_num.val().length > 13 ){
            e.preventDefault();
            phone_num.addClass("is-invalid");
            $('.max-number').text('Max 13');
        }
    });

    $("#form_add_categories").on("submit", function(e){

        if( $("#name_categories").val() == '' ){
            e.preventDefault();
            $("#name_categories").addClass("is-invalid");
        }
    });

    $("#form_add_units").on("submit", function(e){

        if( $("#name_units").val() == '' ){
            e.preventDefault();
            $("#name_units").addClass("is-invalid");
        }
    });

    $("#edit_img_user").on("change", function(e){
        const nameImg =  e.target.files[0].name;
        let reader = new FileReader();

        reader.onload = function(e){
            $('.img-thumbnail').attr('src', e.target.result)
        }

        reader.readAsDataURL(e.target.files[0]);

        e.target.nextElementSibling.innerText = nameImg;
    })

});