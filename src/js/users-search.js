const search = document.querySelector(".users .search input");
const searchButton = document.querySelector(".users .search button")


searchButton.addEventListener('click', function() {
    
    search.classList.toggle('active');
    search.focus();
    searchButton.classList.toggle('active');

    search.addEventListener('keypress', function(event) {

        if (event.keyCode == 13) {
            console.log(search.value);
        }

    });

});