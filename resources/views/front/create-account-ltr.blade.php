@extends('front.layout-ltr')

 @section('content')
 <!--form-->
 <div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">create new account</li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            <form>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                <input placeholder="Birth date" class="form-control" type="text" onfocus="(this.type='date')" id="date">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blood type">
                <select class="form-control">
                    <option selected>Governorate</option>
                    <option>Dakahlia</option>
                    <option>Cairo</option>
                    <option>Alexandria</option>
                </select>
                <select class="form-control">
                    <option selected>City</option>
                    <option>Mansoura</option>
                    <option>Cairo</option>
                    <option>Alexandria</option>
                </select>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone number">
                <input placeholder="Last date for donation" class="form-control" type="text" onfocus="(this.type='date')" id="date">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm password">
                <div class="create-btn">
                    <input type="submit" value="Creat">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
