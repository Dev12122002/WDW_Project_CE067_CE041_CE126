$('.load_pdfdata').on('click',function(){

    
    window.open('openpdf.html', '_blank').focus();
   // window.location.replace("http://localhost/book_store_login/project/openpdf.html");
  
    var href = $(this).attr('href');
    localStorage.setItem("storageName",href);
  });

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

