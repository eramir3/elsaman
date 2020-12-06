<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    <x-header></x-header>

    <main id="slidable">
        <section id="overview" class=""></section>
        <div class="sticky-header">
            <section class="container">
                <div class="fruits__items">
                    <a href="#pineapple"><img id="pineapple-img" class="fruit" src="../images/fruits/pineapple.png" alt=""></a>
                    <a href="#passionfruit"><img id="passionfruit-img" class="fruit" src="../images/fruits/passionfruit.png" alt=""></a>
                    <a href="#strawberry"><img id="strawberry-img" class="fruit" src="../images/fruits/strawberry.png" alt=""></a>
                    <a href="#mango"><img id="mango-img" class="fruit" src="../images/fruits/mango.png" alt=""></a>
                    <a href="#tamarillo"><img id="tamarillo-img" class="fruit" src="../images/fruits/tamarillo.png" alt=""></a>
                    <a href="#guava"><img id="guava-img" class="fruit" src="../images/fruits/guava.png" alt=""></a>
                    <a href="#lulo"><img id="lulo-img" class="fruit" src="../images/fruits/lulo.png" alt=""></a>
                    <a href="#tangerine"><img id="tangerine-img" class="fruit" src="../images/fruits/tangerine.png" alt=""></a>
                    <a href="#blackberry"><img id="blackberry-img" class="fruit" src="../images/fruits/blackberry.png" alt=""></a>
                    <a href="#soursop"><img id="soursop-img" class="fruit" src="../images/fruits/soursop.png" alt=""></a>
                    <a href="#curuba"><img id="curuba-img" class="fruit" src="../images/fruits/curuba.png" alt=""></a>
                    <a href="#feijoa"><img id="feijoa-img" class="fruit" src="../images/fruits/feijoa.png" alt=""></a>
                </div>
            </section>
        </div>
        <section class="container">
            <a id="pineapple" class="anchor"></a>
            <div class="card card__fruit">
                <img src="../images/fruits/pineapple.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">PINEAPPLE</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    
                </div>
            </div>
            
            <div class="card card__fruit">
                <a id="passionfruit" class="anchor"></a>
                <img src="../images/fruits/passionfruit.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">PASSION FRUIT</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="strawberry" class="anchor"></a>
                <img src="../images/fruits/strawberry.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">STRAWBERRY</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="mango" class="anchor"></a>
                <img src="../images/fruits/mango.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">MANGO</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="tamarillo" class="anchor"></a>
                <img src="../images/fruits/tamarillo.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">TAMARILLO</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="guava" class="anchor"></a>
                <img src="../images/fruits/guava.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">GUAVA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="lulo" class="anchor"></a>
                <img src="../images/fruits/lulo.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">LULO</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit">
                <a id="tangerine" class="anchor"></a>
                <img src="../images/fruits/tangerine.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">TANGERINE</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>
            
            <div class="card card__fruit">
                <a id="blackberry" class="anchor"></a>
                <img src="../images/fruits/blackberry.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">BLACKBERRY</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit" >
                <a id="soursop" class="anchor"></a>
                <img src="../images/fruits/soursop.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">SOURSOP</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit" >
                <a id="curuba" class="anchor"></a>
                <img src="../images/fruits/curuba.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">CURUBA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>

            <div class="card card__fruit" >
                <a id="feijoa" class="anchor"></a>
                <img src="../images/fruits/feijoa.png" alt="">
                <div class="fruit-description">
                    <div class="badge badge--purple">FEIJOA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
                <div class="fruit-preparation">
                    <div class="badge badge--pink">PERAPRATION</div>
                    <p><span style="background-color: #FE7E7E; color: white;">1</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                    <p><span style="background-color: #FE7E7E; color: white;">2</span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec ornare leo ut mi consectetur pellentesque
                    </p>
                </div>
            </div>
            
        </section>
    </main>

    <x-footer></x-footer>

</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/shared.js') }}" type="text/javascript"></script>

<script>

    $(document).ready(function(){
    
      // Add smooth scrolling to all links
      $(".fruits__items a").on('click', function(event) {
    
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
    
            // Store hash
            var hash = this.hash;
            let hashId = hash.substring(1);
            var pixels_per_second = 1600;

            console.log(hashId);
            console.log(event.target.id);

            distance = getDistanceBetweenElements(hashId, event.target.id);
            scroll_duration = (distance / pixels_per_second) * 1000;
        
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, scroll_duration, function(){
    
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });

function getPositionAtCenter(element) {
    const {top, left, width, height} = element.getBoundingClientRect();
    return {
        x: left + width / 2,
        y: top + height / 2
    };
 }

function getDistanceBetweenElements(element1, element2) {
    
    let goToElement = document.getElementById(element1);
    let element = document.getElementById(element2);
    const aPosition = getPositionAtCenter(goToElement);
    const bPosition = getPositionAtCenter(element);

    return Math.hypot(aPosition.x - bPosition.x, aPosition.y - bPosition.y);  
}

</script>

</html>
