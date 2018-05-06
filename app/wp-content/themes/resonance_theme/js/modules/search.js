import $ from 'jquery';

class Search{

    //Describe or create or initiate object
    constructor(){
        this.addSearchHTML();
        this.timeDelay=500;
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
                this.typingTimer = setTimeout(this.getResults.bind(this), this.timeDelay);
            }else{
                this.searchField.html('');
                this.isSpinnerVisible = false;
            }
        }

        this.previousValue = this.searchField.val();
        
    };

    getResults(){
        $.when(
            $.getJSON(reiData.root_url + '/wp-json/wp/v2/posts?search='+ this.searchField.val()),
            $.getJSON(reiData.root_url + '/wp-json/wp/v2/pages?search='+ this.searchField.val())
            ).
            then((posts,pages)=>{
                var combinedResults = posts[0].concat(pages[0]);
                this.resultsDiv.html(`
                    <h2 class="search-overlay__section-title">General Information</h2>
                    ${combinedResults.length ? '<ul class="link-list min-list">' : '<p> No General information found </p>'}
                    ${combinedResults.map(item => `<li>
                                            <a href="${item.link}">${item.title.rendered}</a>
                                        </li>`).join('')}
                    ${combinedResults.length ? '</ul>' : ''}
                `);
                this.isSpinnerVisible = false;},
                ()=>{this.resultsDiv.html('<h1>Unexpected error in Javascript search</h1>')}
            );
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
        this.searchField.val('');
        setTimeout(()=>this.searchField.focus(), this.timeDelay + 1 );
        this.isOverlayOpen = true;
    };

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    };

    addSearchHTML(){
        $("body").append(`
        <div class="search-overlay">
            <div class="search-overlay__top">
                <div class="row">
                    <div class="container">
                        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                        <input type="text" class="search-term" placeholder="What are you looking for" name="" id="search-term">
                        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="search-overlay__results generic-text">        
                </div>
            </div>
        </div>
        `);
    }

};

export default Search;

