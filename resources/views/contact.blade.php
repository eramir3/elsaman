<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>

    <x-header></x-header>
    
    <main id="slidable">
        <section id="overview"></section>
        <section class="overview-bottom">
            <div>Find out more!</div>
        </section>
        <section class="container__main form">
            <h3>If you want more information about our products fill this form and we will reach out to you.</h3>
            <div id="label-success" class="success" style="display: none">Your message was sent successfully</div>
            <div id="label-failed" class="failed" style="display: none">Your message could not be sent</div>
            <form method="post" action="{{ route('contact.mail', app()->getLocale()) }}">
                @csrf
                <input type="text" name="name" placeholder="NAME"><br>
                <input type="text" name="email" placeholder="EMAIL"><br>
                <input type="text" name="telephone" placeholder="TELEPHONE"><br>
                <textarea type="text" cols="30" rows="10" name="message" placeholder="MESSAGE"></textarea><br>
                <input type="submit" name="submit" value="ENVIAR">
                <div class="loader"></div>
            </form> 
        </section>
        <section class="container__main">
            <div id="contact">
                <div class="card card__contact whatsapp">
                    <img src="../images/contact/phone-call.svg" class="" alt="">
                    <div>
                        <div class="whatsapp__top">
                            <img src="../images/flags/fr.svg" class="card-flag" alt=""> +33 7 88 22 55 86
                        </div>
                        <div class="whatsapp__bottom">
                            <img src="../images/flags/col.svg" class="card-flag" alt=""> +57 1 305 3095120
                        </div>
                    </div>
                </div>
                <div class="card card__contact envelope" >
                    <img src="../images/contact/email.svg" alt=""> radcofr@ciradco.com
                </div>
            </div>
        </section>
    </main>

    <div class="container">
        <div class="parent-image leave">
            <img class="child-image" src="../images/contact/leave.png" alt="">
        </div>
    </div>
    
    <x-footer></x-footer>

</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/lang-dropdown.js') }}" type="text/javascript"></script>

<script>

    $("input[name='name']").keyup(function () {
        $(this).css('border-color', '#ccc');
        $(this).next().remove('div');
    });

    $("input[name='email']").keyup(function () {
        $(this).css('border-color', '#ccc');
        $(this).next().remove('div');
    });

    $("textarea[name='message']").keyup(function () {
        $(this).css('border-color', '#ccc');
        $(this).next().remove('div');
    });


    $("form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $('#label-success').css('display', 'none');
        $('#label-failed').css('display', 'none');

        $("input[name='name']").next().remove('div');
        $("input[name='name']").css('border-color', '#ccc');

        $("input[name='email']").next().remove('div');
        $("input[name='email']").css('border-color', '#ccc');

        $("textarea[name='message']").next().remove('div');
        $("textarea[name='message']").css('border-color', '#ccc');

        $('.loader').css('display', 'block');
        $("input[name='submit']").css('display', 'none');
        
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('#label-success').css('display', 'block');
                $('.loader').css('display', 'none');
                $("input[name='submit']").css('display', 'flex');
            },
            error: function(error)
            {
                const errors = error.responseJSON.errors;
                const fieldNames = Object.keys(errors);

                $('#label-failed').css('display', 'block');
                $('.loader').css('display', 'none');
                $("input[name='submit']").css('display', 'block');
                

                for(index in fieldNames) {

                    const fieldName = Object.keys(errors)[index];
                    let field =  null;
                    
                    if(fieldName === 'message') {
                        field = document.querySelector("textarea[name='"+fieldName+"']");
                    }
                    else {
                        field = document.querySelector("input[name='"+fieldName+"']");
                    }

                    const fieldErrorMessage = errors[fieldName];
                    field.insertAdjacentHTML('afterend', `<div class="error">${fieldErrorMessage}</div>`);
                    field.style.borderColor = 'red';
                }
            }
        });
    })

</script>

</html>
