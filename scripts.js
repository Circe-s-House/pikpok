$(document).ready(function (){
    const up = document.querySelector("#up");

    up.addEventListener("click", function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

});