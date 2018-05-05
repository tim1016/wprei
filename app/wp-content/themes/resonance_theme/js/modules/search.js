import $ from 'jquery';

class Search{

    //Describe or create or initiate object
    constructor(){
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    //Events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
    }


    //Methods
    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
    };

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
    };


};

export default Search;