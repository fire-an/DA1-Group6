<footer class="container mx-auto mt-[100px] mb-2">
    <div class="grid grid-cols-4 gap-8">
        <div>
            <h3 class="font-bold text-xl">THÔNG TIN LIÊN HỆ</h3>
            <h4 class="font-bold">
                CÔNG TY TNHH THẾ GIỚI GEAR <br />
                MST : 0315758728 <br />
                Ngày cấp : 26/06/2019 <br />
                Nơi Cấp : Sở kế hoạch đầu tư thành phố Hồ Chí Minh <br />
                Chuyên cung cấp linh kiện điện tử, Gaming Gear, PC Hi-End
            </h4>
            <hr class="my-2" />
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <p class="ml-2">
                    Địa chỉ: 63 Nguyễn Cửu Vân Phường 17 Quận Bình Thạnh
                </p>
            </div>
            <hr class="my-2" />
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>

                <p class="ml-2">
                    Hotline : 028.9999.8399 Góp ý - Thắc Mắc : 079.359.1111
                </p>
            </div>
            <hr class="my-2" />
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>

                <p class="ml-2">Email: info@thegioigear.com</p>
            </div>
        </div>
        <div>
            <h3 class="text-xl font-bold">HỖ TRỢ</h3>
            <ul class="mt-4">
                <li class="py-1 hover:text-[#a11917]"><a href="">TÌM KIẾM</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">GIỚI THIỆU</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">CHÍNH SÁCH</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">THANH TOÁN</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">GIAO HÀNG</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">BẢO MẬT</a></li>
                <li class="py-1 hover:text-[#a11917]"><a href="">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div></div>
        <div>
            <div class="mt-3">
                <img src="https://images.dmca.com/Badges/dmca-badge-w150-5x1-03.png?ID=e8783484-7b19-46d5-aabe-69f1d566e2d5" alt="" />
            </div>
            <div class="mt-3">
                <img src="https://theme.hstatic.net/1000037809/1000944346/14/dathongbao.png?v=49" alt="" />
            </div>
        </div>
    </div>
</footer>
<script>
    (function(factory) {
        if (typeof define === "function" && define.amd) {
            define(["jquery"], factory);
        } else if (typeof exports !== "undefined") {
            module.exports = factory(require("jquery"));
        } else {
            factory(jQuery);
        }
    })(function($) {
        /*
         * We define Zippy as a variable of type ‘function’.
         * Here, we use an anonymous function to ensure
         * that the logic inside the function is executed immediately.
         *
         */
        var Zippy = (function(element, settings) {
            var instanceUid = 0;

            /*
             * The constructor function for Zippy
             *
             */
            function _Zippy(element, settings) {
                this.defaults = {
                    slideDuration: "3000",
                    speed: 500,
                    arrowRight: ".arrow-right",
                    arrowLeft: ".arrow-left",
                };

                // We create a new property to hold our default settings after they
                // have been merged with user supplied settings
                this.settings = $.extend({}, this, this.defaults, settings);

                // This object holds values that will change as the plugin operates
                this.initials = {
                    currSlide: 0,
                    $currSlide: null,
                    totalSlides: false,
                    csstransitions: false,
                };

                // Attaches the properties of this.initials as direct properties of Zippy
                $.extend(this, this.initials);

                // Here we'll hold a reference to the DOM element passed in
                // by the $.each function when this plugin was instantiated
                this.$el = $(element);

                // Ensure that the value of 'this' always references Zippy
                this.changeSlide = $.proxy(this.changeSlide, this);

                // We'll call our initiator function to get things rolling!
                this.init();

                // A little bit of metadata about the instantiated object
                // This property will be incremented everytime a new Zippy carousel is created
                // It provides each carousel with a unique ID
                this.instanceUid = instanceUid++;
            }

            return _Zippy;
        })();

        /**
         * Called once per instance
         * Calls starter methods and associate the '.zippy-carousel' class
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.init = function() {
            //Test to see if cssanimations are available
            this.csstransitionsTest();
            // Add a class so we can style our carousel
            this.$el.addClass("zippy-carousel");
            // Build out any DOM elements needed for the plugin to run
            // Eg, we'll create an indicator dot for every slide in the carousel
            this.build();
            // Eg. Let the user click next/prev arrows or indicator dots
            this.events();
            // Bind any events we'll need for the carousel to function
            this.activate();
            // Start the timer loop to control progression to the next slide
            this.initTimer();
        };

        /**
         * Appropriated out of Modernizr v2.8.3
         * Creates a new DOM element and tests existence of properties on it's
         * Style object to see if CSSTransitions are available
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.csstransitionsTest = function() {
            var elem = document.createElement("modernizr");
            //A list of properties to test for
            var props = [
                "transition",
                "WebkitTransition",
                "MozTransition",
                "OTransition",
                "msTransition",
            ];
            //Iterate through our new element's Style property to see if these properties exist
            for (var i in props) {
                var prop = props[i];
                var result = elem.style[prop] !== undefined ? prop : false;
                if (result) {
                    this.csstransitions = result;
                    break;
                }
            }
        };

        /**
         * Add the CSSTransition duration to the DOM Object's Style property
         * We trigger this function just before we want the slides to animate
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.addCSSDuration = function() {
            var _ = this;
            this.$el.find(".slide").each(function() {
                this.style[_.csstransitions + "Duration"] = _.settings.speed + "ms";
            });
        };

        /**
         * Remove the CSSTransition duration from the DOM Object's style property
         * We trigger this function just after the slides have animated
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.removeCSSDuration = function() {
            var _ = this;
            this.$el.find(".slide").each(function() {
                this.style[_.csstransitions + "Duration"] = "";
            });
        };

        /**
         * Creates a list of indicators based on the amount of slides
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.build = function() {
            var $indicators = this.$el
                .append('<ul class="indicators" >')
                .find(".indicators");
            this.totalSlides = this.$el.find(".slide").length;
            for (var i = 0; i < this.totalSlides; i++)
                $indicators.append("<li data-index=" + i + ">");
        };

        /**
         * Activates the first slide
         * Activates the first indicator
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.activate = function() {
            this.$currSlide = this.$el.find(".slide").eq(0);
            this.$el.find(".indicators li").eq(0).addClass("active");
        };

        /**
         * Associate event handlers to events
         * For arrow events, we send the placement of the next slide to the handler
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.events = function() {
            $("body")
                .on(
                    "click",
                    this.settings.arrowRight, {
                        direction: "right"
                    },
                    this.changeSlide
                )
                .on(
                    "click",
                    this.settings.arrowLeft, {
                        direction: "left"
                    },
                    this.changeSlide
                )
                .on("click", ".indicators li", this.changeSlide);
        };

        /**
         * TIMER
         * Resets the timer
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.clearTimer = function() {
            if (this.timer) clearInterval(this.timer);
        };

        /**
         * TIMER
         * Initialise the timer
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.initTimer = function() {
            this.timer = setInterval(this.changeSlide, this.settings.slideDuration);
        };

        /**
         * TIMER
         * Start the timer
         * Reset the throttle to allow changeSlide to be executable
         * @params void
         * @returns void
         *
         */
        Zippy.prototype.startTimer = function() {
            this.initTimer();
            this.throttle = false;
        };

        /**
         * MAIN LOGIC HANDLER
         * Triggers a set of subfunctions to carry out the animation
         * @params	object	event
         * @returns void
         *
         */
        Zippy.prototype.changeSlide = function(e) {
            //Ensure that animations are triggered one at a time
            if (this.throttle) return;
            this.throttle = true;

            //Stop the timer as the animation is getting carried out
            this.clearTimer();

            // Returns the animation direction (left or right)
            var direction = this._direction(e);

            // Selects the next slide
            var animate = this._next(e, direction);
            if (!animate) return;

            //Active the next slide to scroll into view
            var $nextSlide = this.$el
                .find(".slide")
                .eq(this.currSlide)
                .addClass(direction + " active");

            if (!this.csstransitions) {
                this._jsAnimation($nextSlide, direction);
            } else {
                this._cssAnimation($nextSlide, direction);
            }
        };

        /**
         * Returns the animation direction, right or left
         * @params	object	event
         * @returns strong	animation direction
         *
         */
        Zippy.prototype._direction = function(e) {
            var direction;

            // Default to forward movement
            if (typeof e !== "undefined") {
                direction = typeof e.data === "undefined" ? "right" : e.data.direction;
            } else {
                direction = "right";
            }
            return direction;
        };

        /**
         * Updates our plugin with the next slide number
         * @params	object	event
         * @params	string	animation direction
         * @returns boolean continue to animate?
         *
         */
        Zippy.prototype._next = function(e, direction) {
            // If the event was triggered by a slide indicator, we store the data-index value of that indicator
            var index =
                typeof e !== "undefined" ? $(e.currentTarget).data("index") : undefined;

            //Logic for determining the next slide
            switch (true) {
                //If the event was triggered by an indicator, we set the next slide based on index
                case typeof index !== "undefined":
                    if (this.currSlide == index) {
                        this.startTimer();
                        return false;
                    }
                    this.currSlide = index;
                    break;
                case direction == "right" && this.currSlide < this.totalSlides - 1:
                    this.currSlide++;
                    break;
                case direction == "right":
                    this.currSlide = 0;
                    break;
                case direction == "left" && this.currSlide === 0:
                    this.currSlide = this.totalSlides - 1;
                    break;
                case direction == "left":
                    this.currSlide--;
                    break;
            }
            return true;
        };

        /**
         * Executes the animation via CSS transitions
         * @params	object	Jquery object the next slide to slide into view
         * @params	string	animation direction
         * @returns void
         *
         */
        Zippy.prototype._cssAnimation = function($nextSlide, direction) {
            //Init CSS transitions
            setTimeout(
                function() {
                    this.$el.addClass("transition");
                    this.addCSSDuration();
                    this.$currSlide.addClass("shift-" + direction);
                }.bind(this),
                100
            );

            //CSS Animation Callback
            //After the animation has played out, remove CSS transitions
            //Remove unnecessary classes
            //Start timer
            setTimeout(
                function() {
                    this.$el.removeClass("transition");
                    this.removeCSSDuration();
                    this.$currSlide.removeClass("active shift-left shift-right");
                    this.$currSlide = $nextSlide.removeClass(direction);
                    this._updateIndicators();
                    this.startTimer();
                }.bind(this),
                100 + this.settings.speed
            );
        };

        /**
         * Executes the animation via JS transitions
         * @params	object	Jquery object the next slide to slide into view
         * @params	string	animation direction
         * @returns void
         *
         */
        Zippy.prototype._jsAnimation = function($nextSlide, direction) {
            //Cache this reference for use inside animate functions
            var _ = this;

            // See CSS for explanation of .js-reset-left
            if (direction == "right") _.$currSlide.addClass("js-reset-left");

            var animation = {};
            animation[direction] = "0%";

            var animationPrev = {};
            animationPrev[direction] = "100%";

            //Animation: Current slide
            this.$currSlide.animate(animationPrev, this.settings.speed);

            //Animation: Next slide
            $nextSlide.animate(animation, this.settings.speed, "swing", function() {
                //Get rid of any JS animation residue
                _.$currSlide.removeClass("active js-reset-left").attr("style", "");
                //Cache the next slide after classes and inline styles have been removed
                _.$currSlide = $nextSlide.removeClass(direction).attr("style", "");
                _._updateIndicators();
                _.startTimer();
            });
        };

        /**
         * Ensures the slide indicators are pointing to the currently active slide
         * @params	void
         * @returns	void
         *
         */
        Zippy.prototype._updateIndicators = function() {
            this.$el
                .find(".indicators li")
                .removeClass("active")
                .eq(this.currSlide)
                .addClass("active");
        };

        /**
         * Initialize the plugin once for each DOM object passed to jQuery
         * @params	object	options object
         * @returns void
         *
         */
        $.fn.Zippy = function(options) {
            return this.each(function(index, el) {
                el.Zippy = new Zippy(el, options);
            });
        };
    });

    // Custom options for the carousel
    var args = {
        arrowRight: ".arrow-right", //A jQuery reference to the right arrow
        arrowLeft: ".arrow-left", //A jQuery reference to the left arrow
        speed: 1000, //The speed of the animation (milliseconds)
        slideDuration: 4000, //The amount of time between animations (milliseconds)
    };

    $(".carousel").Zippy(args);

    $("#login_menu").hover(
        function() {
            $("#account").show();
        },
        function() {
            $("#account").hide();
        }
    );
    src = "https://cdn.tailwindcss.com"
    const activeImage = document.querySelector(".product-image .active");
    const productImages = document.querySelectorAll(".image-list img");
    const navItem = document.querySelector('a.toggle-nav');

    function changeImage(e) {
        activeImage.src = e.target.src;
    }

    function toggleNavigation() {
        this.nextElementSibling.classList.toggle('active');
    }

    productImages.forEach(image => image.addEventListener("click", changeImage));
    navItem.addEventListener('click', toggleNavigation);

    function cong() {
        // lấy giá trị của textbox
        var t = document.getElementById('textbox').value;
        //công thêm đơn vị vào textbox
        document.getElementById('textbox').value = parseInt(t) + 1;
    }

    function tru() {
        var t = document.getElementById('textbox').value;
        if (parseInt(t) > 1) {
            document.getElementById('textbox').value = parseInt(t) - 1;

        }
    }
</script>

</body>

</html>