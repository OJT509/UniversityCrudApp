//Stackexchange. (2017). Adding a button to toggle between colour schemes on Tumblr?. Retrieved from https://webapps.stackexchange.com/questions/68971/adding-a-button-to-toggle-between-colour-schemes-on-tumblr
//Allows for the inversion of colours
function invertColors() {
    var bodyClasses = document.body.classList;
    if(bodyClasses.contains("inverted")) {
        bodyClasses.remove("inverted");
    } else {
        bodyClasses.add("inverted");
    }
}

//Sajnóg , M.S (2018). aos. Retrieved from https://github.com/michalsnik/aos
//Allows for the animate on scroll effect
AOS.init();

