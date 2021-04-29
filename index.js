//This code For Loding Mobile/Laptop/Watches Page
setTimeout(function(){
	  let loaded = document.getElementById('demo-content');
	  loaded.className += 'loaded';
	}, 3000);


//For Loded Cart Page
window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});

/*##############################################################*/


$(document).ready(function(){

// Navbar Scroll
    if ($(window).width() > 992) {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 40) {
                $('#navbar_top').addClass("fixed-top");
                // add padding top to show content behind navbar
                $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
                $('#navbar_top').removeClass("fixed-top");
                // remove padding top from body
                $('body').css('padding-top', '0');
            }
        });
    }

    /*##############################################################*/

//slick slider
    $('.slider-one')
        .not(".slick-intialized")
        .slick({
            autoplay:true,
            autoplayspeed:3000,
            dots:true,
            prevArrow:".site-slider .slider-btn .prev",
            nextArrow:".site-slider .slider-btn .next"
        });

    /*##############################################################*/

//Top-sale owl-carousel
    $('#top-sale .owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        dots:true,
        responsive:{
            0 :{
                items: 1
            },
            600 :{
                items: 3
            },
            1000 :{
                items: 5
            }
        }
    });

    /*##############################################################*/

//isotope-filter for recent-arrived
    $grid=$(".grid").isotope({
        itemSelector :'.grid-item',
        layoutMode :'fitRows'
    });
    //filter item onClicke on Button
    $(".button-groub").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    })

    /*##############################################################*/

//owl-carousel for Testimonial
    $('#testimonial .owl-carousel').owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0 :{
                items: 1
            },
            600 :{
                items: 3
            }
        }
    });

    /*##############################################################*/

//owl-carousel for Brands
    $('#brands .owl-carousel').owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0 :{
                items: 1
            },
            600 :{
                items: 3
            },
            1000 :{
                items: 5
            }
        }
    });


    /*##############################################################*/

//product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
// let $input = $(".qty .qty_input");

// click on qty up button
    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url:"Template/qty_ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(Result){
                let obj = JSON.parse(Result);
                let item_price = obj[0]['product_new_price'];

                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });

                    // increase price of the product
                    $price.text(parseFloat(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseFloat($deal_price.text()) + parseFloat(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty up button


// click on qty down button
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url:"Template/qty_ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(Result){
                let obj = JSON.parse(Result);
                let item_price = obj[0]['product_new_price'];

                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });

                    // increase price of the product
                    $price.text(parseFloat(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseFloat($deal_price.text()) - parseFloat(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty down button


    /*##############################################################*/

//For Filter Products in Mobile Page
    $(".product_check").click(function(){

        $("#result").css("display","none");
        $('#loder_P').show();


        var action = 'data';
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            type:"post",
            data:{action:action, brand:brand, ram:ram, storage:storage},
            success:function(response){
                setTimeout(function (){
                    $("#result").css("display","flex");
                    $("#result").html(response);
                    $('#loder_P').hide();

                },1500);
            }
        });

    });

//For Filter Products in Waeches Page
    $(".product_check_W").click(function(){

        $("#result_W").css("display","none");
        $('#loder_P').show();

        var action_W = 'data';
        var brand = get_filter('brand');
        $.ajax({
            url:"fetch_data.php",
            type:"post",
            data:{action_W:action_W, brand:brand},
            success:function(response){
                setTimeout(function (){
                    $("#result_W").css("display","flex");
                    $("#result_W").html(response);
                    $('#loder_P').hide();

                },1500);
            }
        });

    });

//For Filter Products in Laptop Page

    $(".product_check_L").click(function(){


        $("#result_L").css("display","none");
        $('#loder_P').show();


        let action_L = 'data';
        let Price_L = get_filter('Price');
        let brand_L = get_filter('brand');
        let ram_L = get_filter('ram');
        let storage_L = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            type:"post",
            data:{action_L:action_L, Price_L:Price_L, brand_L:brand_L, ram_L:ram_L, storage_L:storage_L},
            success:function(response){
                setTimeout(function (){
                    $("#result_L").css("display","flex");
                    $("#result_L").html(response);
                    $('#loder_P').hide();

                },1500);

            }
        });
    });


    function get_filter(class_name){
        var filterData = [];
        $('.'+class_name+':checked').each(function(){
            filterData.push($(this).val());
        });
        return filterData;
    }




});