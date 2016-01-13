var BookReviewSlider = function () {

    return {

        //Master Slider
        initSlider: function () {
		    var slider = new MasterSlider();
		     
		    slider.control('arrows');  
		    slider.control('thumblist' , {autohide:false ,dir:'h',arrows:false, align:'bottom', width:180, height:170, margin:5, space:5});
		 
		    slider.setup('masterslider' , {
		        width:550,
		        height:550,
		        space:5,
		        view:'fade'
		    });
        }

    };

}();