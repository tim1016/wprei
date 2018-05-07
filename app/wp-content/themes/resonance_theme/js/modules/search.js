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
        $.getJSON(reiData.root_url + '/wp-json/rei/v1/search?term='+ this.searchField.val(), (results) => {
            this.resultsDiv.html(`
            <div class="row">
                <div class="col-1-of-3">
                    <h2 class="search-overlay__section-title">General Information</h2>
                    ${results.generalInfo.length ? '<ul class="link-list min-list">' : '<p> No General information found </p>'}
                    ${results.generalInfo.map(item => `<li>
                                                        <a href="${item.permalink}">${item.title}</a>
                                                        ${item.postType == 'post' ? `by ${item.authorName}` : ''}
                                                        </li>`).join('')}
                    ${results.generalInfo.length ? '</ul>' : ''}
                </div>
                <div class="col-1-of-3">
                    <h2 class="search-overlay__section-title">Programs</h2>
                    ${results.programs.length ? '<ul class="link-list min-list">' : `<p> No programs the search criterion. <a href="${reiData.root_url}/programs">View All Programs</a> </p>`}
                    ${results.programs.map(item => `<li>
                                                        <a href="${item.permalink}">${item.title}</a>
                                                        </li>`).join('')}
                    ${results.programs.length ? '</ul>' : ''}


                    <h2 class="search-overlay__section-title">Professors</h2>
                    ${results.professors.length ? '<ul class="person-cards">' : `<p>No professors match that search.</p>`}
                      ${results.professors.map(item => `
                        <li class="person-card__list-item">
                          <a class="person-card" href="${item.permalink}">
                            <img class="person-card__image" src="${item.image}">
                            <span class="person-card__name">${item.title}</span>
                          </a>
                        </li>
                      `).join('')}
                    ${results.professors.length ? '</ul>' : ''}
            
                </div>
                <div class="col-1-of-3">
                    <h2 class="search-overlay__section-title">Campuses</h2>
                    ${results.campuses.length ? '<ul class="link-list min-list">' : `<p> No campuses the search criterion. <a href="${reiData.root_url}/campuses">View All Campuses</a> </p>`}
                    ${results.campuses.map(item => `<li>
                                                        <a href="${item.permalink}">${item.title}</a>
                                                        </li>`).join('')}
                    ${results.campuses.length ? '</ul>' : ''}  



                    <h2 class="search-overlay__section-title">Events</h2>   
                    ${results.events.length ? '' : `<p> No campuses the search criterion. <a href="${reiData.root_url}/events">View All Campuses</a> </p>`}
                    ${results.events.map(item => `
                    <div class="event-summary">
                    <a class="event-summary__date u-center-text" href="${item.permalink}">
                        <span class="event-summary__month">${item.month}</span>
                        <span class="event-summary__day">${item.day}</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
                        <p> ${item.description} <a href="${item.permalink}" class="nu gray">Learn more</a> </p>
                    </div>
                    </div>                    
                    
                    `).join('')}
                    
                </div>
            </div>   
            `);
            this.isSpinnerVisible=false;
        });

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

