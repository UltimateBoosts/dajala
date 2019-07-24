<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{$blog->title}}</title>
</head>

<body>
    <section class="blog">
            @include('header-black') 
            <div class="container">
                <div class="blog-content">
                    <img class="main-image" src={{asset('storage/blog/images/'.$blog->id.'/large/'.$blog->image)}} alt="">
                    {!! $blog->content !!}
                </div>
            </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="https://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>