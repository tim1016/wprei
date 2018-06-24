import $ from 'jquery';

class Like{
    constructor (){
        this.events();
        
    }

    events(){
        $(".like-box").on("click", this.ourClickDispatcher.bind(this));
    }

    //Methods
    ourClickDispatcher(e){
        var currentLikeBox = $(e.target).closest(".like-box");

        if(currentLikeBox.data("exists") == 'yes'){
            this.deleteLike(currentLikeBox);
        }
        else{
            this.createLike(currentLikeBox);
        }

    }

    createLike(currentLikeBox){

        $.ajax({
            url: reiData.root_url + '/wp-json/rei/v1/manageLike',
            type: 'POST',
            data:{'professorID':currentLikeBox.data("professor")},
            success: (response)=>{
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            } 
        });
    }

    deleteLike(currentLikeBox){
        $.ajax({
            url: reiData.root_url + '/wp-json/rei/v1/manageLike',
            type: 'DELETE',
            success: (response)=>{
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            } 
        });
    }
}

export default Like;