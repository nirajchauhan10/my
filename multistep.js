 jQuery( document ).ready(function() {
         var base_color = "rgb(230,230,230)";
         var active_color = "rgb(237, 40, 70)";
         var child = 1;
         var length = jQuery("section").length - 1;
         jQuery("#prev").addClass("disabled");
         jQuery("#submit").addClass("disabled");
         
         jQuery("section").not("section:nth-of-type(1)").hide();
         jQuery("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');
         
         var svgWidth = length * 200 + 24;
         jQuery("#svg_wrap").html(
           '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
             svgWidth +
             ' 24" xml:space="preserve"></svg>'
         );
         
         function makeSVG(tag, attrs) {
           var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
           for (var k in attrs) el.setAttribute(k, attrs[k]);
           return el;
         }
         
         for (i = 0; i < length; i++) {
           var positionX = 12 + i * 200;
           var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
           document.getElementById("svg_form_time").appendChild(rect);
           // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
           var circle = makeSVG("circle", {
             cx: positionX,
             cy: 12,
             r: 12,
             width: positionX,
             height: 6
           });
           document.getElementById("svg_form_time").appendChild(circle);
         }
         
         var circle = makeSVG("circle", {
           cx: positionX + 200,
           cy: 12,
           r: 12,
           width: positionX,
           height: 6
         });
         document.getElementById("svg_form_time").appendChild(circle);
         
         jQuery('#svg_form_time rect').css('fill',base_color);
         jQuery('#svg_form_time circle').css('fill',base_color);
         jQuery("circle:nth-of-type(1)").css("fill", active_color);
         
          
         jQuery(".button").click(function () {
           jQuery("#svg_form_time rect").css("fill", active_color);
           jQuery("#svg_form_time circle").css("fill", active_color);
           var id = jQuery(this).attr("id");
           if (id == "next") {
             jQuery("#prev").removeClass("disabled");
             if (child >= length) {
               jQuery(this).addClass("disabled");
               jQuery('#submit').removeClass("disabled");
             }
             if (child <= length) {
               child++;
             }
           } else if (id == "prev") {
             jQuery("#next").removeClass("disabled");
             jQuery('#submit').addClass("disabled");
             if (child <= 2) {
               jQuery(this).addClass("disabled");
             }
             if (child > 1) {
               child--;
             }
           }
           var circle_child = child + 1;
           jQuery("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
             "fill",
             base_color
           );
           jQuery("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
             "fill",
             base_color
           );
           var currentSection = jQuery("section:nth-of-type(" + child + ")");
           currentSection.fadeIn();
           currentSection.css('transform','translateX(0)');
          currentSection.prevAll('section').css('transform','translateX(-100px)');
           currentSection.nextAll('section').css('transform','translateX(100px)');
           jQuery('section').not(currentSection).hide();
         });
         
         });