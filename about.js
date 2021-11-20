let navbar = document.querySelector('.navbar');
let navbar2 = document.querySelector('#navbar-example2');
$('#navbar-example2').hide();
        document.addEventListener("DOMContentLoaded", function () {
            window.addEventListener('scroll', function () {
                if (this.scrollY > 470) {
                    // document.getElementById('navbar_top').classList.add('fixed-top');
                    // // add padding top to show content behind navbar
                    // navbar_height = document.querySelector('.navbar').offsetHeight;
                    // document.body.style.paddingTop = navbar_height + 'px';

                    navbar.classList.add("navbar-color");
                    // navbar.classList.add("bg-black");
                    navbar2.classList.add("fixed-top");
                    $('#navbar-example2').show();
                }
                else {
                    // document.getElementById('navbar_top').classList.remove('fixed-top');
                    //  // remove padding top from body
                    // document.body.style.paddingTop = '0';
                    navbar.classList.remove("navbar-color");
                    $('#navbar-example2').hide();
                }
                console.log(window.scroll);
                
            });
        });

        var TxtRotate = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtRotate.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 300 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function () {
                that.tick();
            }, delta);
        };

        window.onload = function () {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-rotate');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtRotate(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
            document.body.appendChild(css);
        };

var canvas = document.querySelector('canvas');
var canvasWidth = canvas.width = window.innerWidth;
var canvasHeight = canvas.height = window.innerHeight;
var ctx = canvas.getContext('2d');
var heightScale = 0.866;


function rnd(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
};


function render() {
    ctx.fillStyle = 'rgb(246,249,252)';
    ctx.fillRect(0, 0, canvasWidth, canvasHeight);
    ctx.lineWidth = 0;

    var hueStart = rnd(0, 0);
    var triSide = 40;
    var halfSide = triSide / 2;
    var rowHeight = Math.floor(triSide * heightScale);
    var columns = Math.ceil(canvasWidth / triSide) + 1;
    var rows = Math.ceil(canvasHeight / rowHeight);

    var col, row;
    for (row = 0; row < rows; row++) {
        var hue = hueStart + (row * 3);

        for (col = 0; col < columns; col++) {

            var x = col * triSide;
            var y = row * rowHeight;
            var clr;

            if (row % 2 != 0) {
                x -= halfSide;
            }

            // upward pointing triangle
            clr = 'hsl(' + hue + ', 0%, ' + rnd(90, 240) + '%)';
            ctx.fillStyle = clr;
            ctx.strokeStyle = clr;
            ctx.beginPath();
            ctx.moveTo(x, y);
            ctx.lineTo(x + halfSide, y + rowHeight);
            ctx.lineTo(x - halfSide, y + rowHeight);
            ctx.closePath();
            ctx.fill();
            //ctx.stroke(); // needed to fill antialiased gaps on edges

            // downward pointing triangle
            clr = 'hsl(' + hue + ', 0%, ' + rnd(90, 245) + '%)';
            ctx.fillStyle = clr;
            ctx.strokeStyle = clr;
            ctx.beginPath();
            ctx.moveTo(x, y);
            ctx.lineTo(x + triSide, y);
            ctx.lineTo(x + halfSide, y + rowHeight);
            ctx.closePath();
            ctx.fill();
            //ctx.stroke();

        };
    };
};

document.body.appendChild(canvas);

render();

document.body.addEventListener('click', render);

//PARTICLES ORANGE//
particlesJS("particleCanvas-Orange", 
{
  "particles": {
    "number": {
      "value": 120,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ec543f"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 3
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": true,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 20,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 10,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 0.5,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "bounce",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 394.57382081613633,
        "rotateY": 157.82952832645452
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 200,
        "line_linked": {
          "opacity": 0.2
        }
      },
      "bubble": {
        "distance": 1500,
        "size": 40,
        "duration": 7.272727272727273,
        "opacity": 0.3676323676323676,
        "speed": 3
      },
      "repulse": {
        "distance": 50,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});


//PARTICLES BLUE//
particlesJS("particleCanvas-Blue", 
{
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 3
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 0.2,
        "opacity_min": 0,
        "sync": false
      }
    },
    "size": {
      "value": 15,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 10,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 0.5,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "bounce",
      "bounce": false,
      "attract": {
        "enable": true,
        "rotateX": 3945.7382081613637,
        "rotateY": 157.82952832645452
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "grab"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 200,
        "line_linked": {
          "opacity": 0.2
        }
      },
      "bubble": {
        "distance": 1500,
        "size": 40,
        "duration": 7.272727272727273,
        "opacity": 0.3676323676323676,
        "speed": 3
      },
      "repulse": {
        "distance": 50,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});