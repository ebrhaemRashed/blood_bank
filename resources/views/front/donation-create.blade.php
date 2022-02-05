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
            <form action="{{route('donation-store')}}" method="post">
                @csrf
                @include('partials.validation_errors')


                <input type="text" class="form-control"  name="patient_name" placeholder="اسم المريض">
                <input type="text" class="form-control"  name="patient_phone" placeholder="رقم المريض">
                <input type="text" class="form-control"  name="patient_age" placeholder="عمر المريض">
                <input type="text" class="form-control"  name="hospital_name" placeholder="اسم المستشفى">
                <input type="text" class="form-control"  name="hospital_address" placeholder="عنوان المستشفى">
                <input type="text" class="form-control"  name="bags_num" placeholder=" عدد اكياس الدم ">

                @inject('bloods', 'App\Models\BloodType')
                <select name="blood_type_id">
                    @foreach ($bloods->all() as $blood)
                        <option value="{{$blood->id}}"> {{$blood->name}} </option>
                    @endforeach
                </select>

                @inject('cities', 'App\Models\City')
                <select name="city_id">
                    @foreach ($cities->all() as $city)
                        <option value="{{$city->id}}"> {{$city->name}} </option>
                    @endforeach
                </select>
                <div class="create-btn">
                    <input type="submit" value="إنشاء">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


