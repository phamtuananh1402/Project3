<header>
    <h1>Feedback Form</h1>
    <link rel="stylesheet" href="/css/feedback.css">
    <script>
        $('document').ready(function () {
            $('input[type="text"], input[type="email"], textarea').focus(function () {
                var background = $(this).attr('id');
                $('#' + background + '-form').addClass('formgroup-active');
                $('#' + background + '-form').removeClass('formgroup-error');
            });
            $('input[type="text"], input[type="email"], textarea').blur(function () {
                var background = $(this).attr('id');
                $('#' + background + '-form').removeClass('formgroup-active');
            });

            function errorfield(field) {
                $(field).addClass('formgroup-error');
                console.log(field);
            }

            $("#waterform").submit(function () {
                var stopsubmit = false;

                if ($('#name').val() == "") {
                    errorfield('#name-form');
                    stopsubmit = true;
                }
                if ($('#email').val() == "") {
                    errorfield('#email-form');
                    stopsubmit = true;
                }
                if (stopsubmit) return false;
            });

        });
    </script>
</header>

<div id="form">

    <div class="fish" id="fish"></div>
    <div class="fish" id="fish2"></div>

    <form id="waterform" method="post">
        {{csrf_field()}}
        <div class="formgroup" id="name-form">
            <label for="name">Your name*</label>
            <input type="text" id="name" name="name"/>
        </div>

        <div class="formgroup" id="email-form">
            <label for="email">Your e-mail*</label>
            <input type="email" id="email" name="email"/>
        </div>

        <div class="formgroup" id="message-form">
            <label for="message">Your message*</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <input type="submit" value="Send your message!"/>
    </form>
</div>
