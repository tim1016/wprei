import $ from 'jquery';

class Search{

    //Describe or create or initiate object
    constructor(){
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.typingTimer;
        this.previousValue;
        this.resultsDiv = $(".search-overlay__results");
    }

    //Events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyDispatcher.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));

    }


    //Methods
    typingLogic(){

        if(this.searchField.val() != this.previousValue){
            clearTimeout(this.typingTimer);

            if(this.searchField.val()){
                if(!this.isSpinnerVisible){
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
            }else{
                this.searchField.html('');
                this.isSpinnerVisible = false;
            }
        }

        this.previousValue = this.searchField.val();
        
    };

    getResults(){
        this.isSpinnerVisible = false;
        this.resultsDiv.html("Imagine real search results here");

    }


    keyDispatcher(e){
        if(e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is('focus'))
        {   
            this.openOverlay();
        }
        if(e.keyCode == 27 && this.isOverlayOpen)
        {
            this.closeOverlay();
        }
    }



    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        this.isOverlayOpen = true;
    };

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    };


};

export default Search;