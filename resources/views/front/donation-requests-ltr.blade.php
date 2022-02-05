@extends('front.layout-ltr')

@section('content')

<!--inside-article-->
<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donation requests</li>
                </ol>
            </nav>
        </div>

        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>Donation requests</h2>
            </div>
            <div class="content">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Choose blood type</option>
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>AB+</option>
                                    <option>O-</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Choose city</option>
                                    <option>Mansoura</option>
                                    <option>Cairo</option>
                                    <option>Alexandria</option>
                                    <option>Sohag</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    <div class="details">
                        <div class="blood-type">
                            <h2>B+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>A+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>AB+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>O-</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>B+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="#">More</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>A+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>AB+</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                    <div class="details">
                        <div class="blood-type">
                            <h2>O-</h2>
                        </div>
                        <ul>
                            <li><span>Patoent name:</span> Ahmed Mohamed Ahmed</li>
                            <li><span>Hospital:</span> Al Qasr Al Ainy</li>
                            <li><span>City:</span> Mansour</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                </div>
                <div class="pages">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
