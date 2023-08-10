$(document).ready(function () {
    // $(".like1").click(function(){

    //     if( !$(".a").hasClass("d-none")){
    //         $(".a").addClass("d-none" );
    //         if ($(".like-click").hasClass("liked")) {
    //                 var audio = new Audio('../images/sounds/like_button.mp3');
    //                 audio.play();
    //             }
    //                 $(".b").removeClass("d-none" );
    //                     // $(".b").addClass("liked");
    //     }else{
    //         $(".a").removeClass("d-none" );
    //             $(".a").addClass("liked");
    //                 $(".b").addClass("d-none");
    //     }


    // });
    $(".like1").click(function () {
        var likeForm = $(".like-form");
        var unlikeForm = $(".unlike-form");

        if (likeForm.hasClass("d-none")) {
            likeForm.removeClass("d-none");
            unlikeForm.addClass("d-none");

            if ($(".like-click").hasClass("liked")) {
                var audio = new Audio('../images/sounds/like_button.mp3');
                audio.play();
            }
        } else {
            likeForm.addClass("d-none");
            unlikeForm.removeClass("d-none");
        }
    });

    $(".favorated button").click(function(){
        $(".favo").toggleClass("liked");
        if ($(".favo").hasClass("liked")) {
            var audio = new Audio('../images/sounds/favorate.mp3');
            audio.play();
        }

   });
    $(".rate").click(function(){
        $(".add-rate").toggleClass("dis");
   });
    $(".comment").click(function(){
        $(".add-comment").toggleClass("dis");

   });
     // Get references to the big image and all small images
     const $bigImage = $("#bigImage");
     const $smallImages = $("#details .box img");

     // Attach click event handler to all small images
     $smallImages.on("click", function() {
         // Get the source of the clicked small image
         const smallImageSrc = $(this).attr("src");
         // Update the big image source with the clicked small image's source
         $bigImage.attr("src", smallImageSrc);
         var audio = new Audio('../images/sounds/image_click.mp3');
         audio.play();
     });

});


$(window).on("load" , function(){
    $(".lds-hourglass").fadeOut(2000,function(){
        $(this).parent().fadeOut(2000,function(){
            $(this).remove();
        })
    })
});
