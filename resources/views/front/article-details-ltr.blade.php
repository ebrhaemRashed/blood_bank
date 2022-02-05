@extends('front.layout-ltr')

@section('content')

<div class="inside-article">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="#">Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Disease prevention</li>
                </ol>
            </nav>
        </div>
        <div class="article-image">
            <img src="{{asset('front/imgs/p1.jpg')}}">
        </div>
        <div class="article-title col-12">
            <div class="h-text col-6">
                <h4>Method of disease prevention</h4>
            </div>
            <div class="icon col-6">
                <button type="button"><i class="far fa-heart"></i></button>
            </div>
        </div>

        <!--text-->
        <div class="text">
            <p>
                This text is an example of text that can be replaced in the same space, this text has been generated from the Arabic text generator, where you can generate such text or many other texts in addition to increasing the number of characters that the application generates. If you need a larger number of paragraphs, the Arabic text generator allows you to increase the number of paragraphs as you want, the text will not appear divided and does not contain linguistic errors, the Arabic text generator is useful for web designers in particular, as the client often needs to see a real picture For website design. Hence, the designer must put temporary texts on the design to show the customer the complete form, the role of the Arabic text generator is to spare the designer the trouble of searching for an alternative text that has nothing to do with the topic the design is talking about.
            </p> <br>
            <p>
                This text is an example of text that can be replaced in the same space, this text has been generated from the Arabic text generator, where you can generate such text or many other texts in addition to increasing the number of characters that the application generates. If you need a larger number of paragraphs, the Arabic text generator allows you to increase the number of paragraphs as you want, the text will not appear divided and does not contain linguistic errors, the Arabic text generator is useful for web designers in particular, as the client often needs to see a real picture For website design. Hence, the designer must put temporary texts on the design to show the customer the complete form, the role of the Arabic text generator is to spare the designer the trouble of searching for an alternative text that has nothing to do with the topic the design is talking about.
            </p>
        </div>

        <!--articles-->
        <div class="articles">
            <div class="title">
                <div class="head-text">
                    <h2>Related articles</h2>
                </div>
            </div>
            <div class="view">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('front/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="article-details.html" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">Method of disease prevention</h5>
                                <p class="card-text">
                                    This text is an example of text that can be replaced in the same space. This text was generated.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('front/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="article-details.html" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">Method of disease prevention</h5>
                                <p class="card-text">
                                    This text is an example of text that can be replaced in the same space. This text was generated.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('front/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="article-details.html" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">Method of disease prevention</h5>
                                <p class="card-text">
                                    This text is an example of text that can be replaced in the same space. This text was generated.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('front/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="article-details.html" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">Method of disease prevention</h5>
                                <p class="card-text">
                                    This text is an example of text that can be replaced in the same space. This text was generated.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('front/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="article-details.html" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">Method of disease prevention</h5>
                                <p class="card-text">
                                    This text is an example of text that can be replaced in the same space. This text was generated.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
