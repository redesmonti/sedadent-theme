var app = new Vue({
    el: '#app',
    data: {
        currentSlide: 0,
        isPreviousSlide: false,
        isFirstLoad: true,
        slides: [
            {
                headlineFirstLine: "Prueba",
                headlineSecondLine: "Slider",
                sublineFirstLine: "Seda",
                sublineSecondLine: "dent",
                bgImg: "http://testmonti.sedadent.cl/wp-content/uploads/2018/01/inicio_web.jpg",
                rectImg: ""
            },
            {
                headlineFirstLine: "Nulla",
                headlineSecondLine: "Auctor",
                sublineFirstLine: "Il n'y a rien de neuf sous",
                sublineSecondLine: "le soleil",
                bgImg: "http://testmonti.sedadent.cl/wp-content/uploads/2018/01/slideabout.jpg",
                rectImg: "https://s27.postimg.org/r00xg9gib/slide_rect1.jpg"
            },
            {
                headlineFirstLine: "Nullam",
                headlineSecondLine: "Ultricies",
                sublineFirstLine: "Τίποτα καινούργιο κάτω από",
                sublineSecondLine: "τον ήλιο",
                bgImg: "http://testmonti.sedadent.cl/wp-content/uploads/2018/01/2.jpg",
                rectImg: "https://s28.postimg.org/a2i6ateul/slide_rect2.jpg"
            }
        ],
        timer: null
    },
  ready: function () {
    this.startRotation();
    var productRotatorSlide = document.getElementById("app");
        var startX = 0;
        var endX = 0;

        productRotatorSlide.addEventListener("touchstart", (event) => startX = event.touches[0].pageX);

        productRotatorSlide.addEventListener("touchmove", (event) => endX = event.touches[0].pageX);

        productRotatorSlide.addEventListener("touchend", function(event) {
            var threshold = startX - endX;

            if (threshold < 10 && 0 < this.currentSlide) {
                this.currentSlide--;
            }
            if (threshold > -10 && this.currentSlide < this.slides.length - 1) {
                this.currentSlide++;
            }
        }.bind(this));
  },
    methods: 
  {
        updateSlide(index) {
            index < this.currentSlide ? this.isPreviousSlide = true : this.isPreviousSlide = false;
            this.currentSlide = index;
            this.isFirstLoad = false;
        },
        startRotation: function() {
            this.timer = setInterval(this.next, 4000);
        },

        stopRotation: function() {
            clearTimeout(this.timer);
            this.timer = null;
        },

        next: function() {
            if(this.currentSlide === this.slides.length - 1) {
						this.currentSlide = 0
						return;
					}
            this.currentSlide += 1
        }
    }
})


