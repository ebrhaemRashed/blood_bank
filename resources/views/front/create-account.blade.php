@extends('front.layout')

@section('content')

  <!--form-->
  <div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            <form action="{{route('client-register')}}" method="post">
                @csrf
                @include('partials.validation_errors')
                <input type="text" class="form-control" id="name" name="name" placeholder="الإسم">

                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                <input type="text"  placeholder="تاريخ الميلاد" class="form-control"  onfocus="(this.type='date')" id="date" name="d_o_b">

                <label for="blood_type"> فصيلة الدم </label>

                @inject('bloodTypes','App\Models\BloodType' )
                <select id="blood_type" name="blood_type" placeholder="فصيلة الدم">
                    @foreach ($bloodTypes->all() as $bloodtype)
                     <option value="{{$bloodtype->id}}"> {{$bloodtype->name}} </option>
                     @endforeach
                </select>

                @inject('governs','App\Models\Governorate' )
                <select class="form-control" id="governorates" name="governorate">
                    <option selected disabled hidden value="">المحافظة</option>
                    @foreach ($governs->all() as $govern)
                    <option value="{{$govern->id}}"> {{$govern->name}} </option>
                    @endforeach
                </select>


                <select class="form-control" id="cities" name="city_id">
                    <option   selected disabled hidden value="">المدينة</option>

                </select>

                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">


                <input type="password"  name ="password" class="form-control"  placeholder="كلمة المرور">

                <input type="password" name="password_confirmation" class="form-control"  placeholder="تأكيد كلمة المرور">

                <div class="create-btn">
                    <input type="submit" value="إنشاء">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>

        $('#governorates').change(function (e){
            // e.preventDefault();
            var governorate_id = $('#governorates').val();
            if(governorate_id)
            {
                $.ajax(
                {
                    url : '{{url('api/cities?governorate_id=')}}' +governorate_id,
                      //:   'api/cities?governorate_id=' + '3'
                    type : 'get',
                    success : function(data){
                       if (data.status == 1)
                       {

                        $.each(data.data,function(index,city){
                            console.log(city);
                            $('#cities').append('<option value="'+city.id+'">'+city.name+'</option>');

                        });
                       }
                    }
                });


            }

        });







</script>
@endsection
