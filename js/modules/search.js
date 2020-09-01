 import $ from 'jquery';
 class search{
     //1. describe our object
     constructor(){
        //  alert('hello  search');
       this.openbutton = $('.js-search-trigger');
       this.closebutton = $('.search-overlay__close');
       this.searchoverlay = $('.search-overlay');
       this.events();

     }
     //2. events
        events(){
            this.openbutton.on('click',this.openoverlay.bind(this));
            this.closebutton.on('click',this.closeoverlay.bind(this));
            $(document).on('keyup',this.keysearch.bind(this));
        }
     //3. method (function,action...)
     keysearch(e){
         e.keycode
         console.log('this is search');
         if(e.keycode == 83){
                this.openoverlay();
         }
         if(e.keycode == 27){
             this.closeoverlay();
         }
     }
     openoverlay(){
        this.searchoverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
    }
    closeoverlay(){
        this.searchoverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");

     }
 }

 export default search;