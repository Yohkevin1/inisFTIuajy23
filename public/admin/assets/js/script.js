document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
            // show navbar
                if( $(".bx-menu").hasClass("bx-x")){
                    $(".inner-dropdown").hide()
                }
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
        if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
        }
    }

    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    // Your code to run since DOM is loaded and ready
    
});


$(function(){
    $('.nav_link').click(function(){
        // $(this).children('ul.nav_name').next().toggle()
        $(this).find(".inner-dropdown").toggle()

        if(!$(".l-navbar").hasClass("show")){
            $(".l-navbar").toggleClass("show")
            $("#body").toggleClass("body-pd")
            $("header").toggleClass("body-pd")
            $(".bx-menu").toggleClass("bx-x")

            $("#body-pd").toggleClass("body-pd")




        }
    })

    
})
