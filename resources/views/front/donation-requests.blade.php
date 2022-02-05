@extends('front.layout')

@section('content')

    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                    <a href="{{route('donation-create')}}" > <h5>انشاء طلب تبرع</h5> </a>

                </div>
                <div class="content">
                    <form  onsubmit="test()" class="row filter" method="get" action="">
                        @include('partials.validation_errors')
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">

                                    @inject('bloodTypes','App\Models\BloodType' )
                                    <select class="form-control" name="blood_type_id" id="blood_type">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach ($bloodTypes->all() as $bloodtype)
                                        <option value="{{$bloodtype->id}}"> {{$bloodtype->name}} </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select  name ="city_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>اختر المدينة</option>
                                        @inject('cities', 'App\Models\City')
                                        @foreach ($cities->all() as $city)
                                            <option value="{{$city->id}}"> {{$city->name}} </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button id="but" type="submit">
                                <i class="fas fa-search"></i>
                            </button>

                        </div>
                    </form>


                    <div class="patients" id="patients">
                        @foreach ($donations as $donation )

                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{$donation->bloodType->name}}</h2>
                            </div>
                            <ul>
                                <li><span>اسم الحالة:</span> {{$donation->client->name}} </li>
                                <li><span>مستشفى:</span> {{$donation->hospital_address}}</li>
                                <li><span>المدينة:</span> {{$donation->city->name}}</li>
                            </ul>
                            <a href="#">التفاصيل</a>
                        </div>

                        @endforeach










                    </div>

                    <div class="pages">
                        {!! $donations->links() !!}
                        {{--  <nav aria-label="Page navigation example" dir="ltr">
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
                        </nav>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{--  @section('script')
    <script>

    function test(){
        $.ajax({
            url : 'front/search',
            type : 'get',
            success : function(data){
                console.log(data);

                if(data.status==1)
                {
                    $('#patients').hide();
                }
            }
         });
    }

    </script>

@endsection  --}}
