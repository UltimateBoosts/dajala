<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>

<body>
    <section class="blog">
        <div class="main">
            @include('header-white') 
            <div class="container">
                <h2 class="titleh2">Articulos</h2>
                <div class="services-items">
                @if(count($blogs)>0)
                @foreach($blogs as $blog)
                <div class="blog-items-item">
                    <div class="blog-items-item-back">
                        <img src={{asset('storage/blog/images/'.$blog->id.'/smalls/'.$blog->image)}} alt="">
                    </div>
                    <div class="newfeature">
                        <div class="content">
                                <h3>{{$blog->title}}</h3>
                                <p class="block-with-text">{{$blog->description}}</p>
                        </div>
                        <div class="goblog">
                        <a href={{url('blog/'.$blog->slug)}} class="btn">Ver</a>
                        </div>
                    </div>

                </div>
                @endforeach
                @else
                    <div class="no-blogs color-white">
                        <h3>No hay articulos en el momento</h3>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/b40ab28631.js"></script>
</body>
<footer>
    <div class="d-none">Icons made by <a href="https://www.freepik.com/?__hstc=57440181.32e0e4276a5c5a97898d2525d449e5e3.1559612798111.1559612798111.1559612798111.1&__hssc=57440181.8.1559612798112&__hsfp=1578147624" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="https://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</footer>

</html>