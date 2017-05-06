@extends('user.master')
@section('description', 'Register')
@section('author', 'Nam Anh')
@section('content')
<section id="product">
    <div class="container">
        <!--  breadcrumb -->
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
                <span class="divider">/</span>
            </li>
            <li class="active">Register Account</li>
        </ul>
        <div class="row">
            <!-- Register Account-->
            <div class="span9">
                <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
                <form class="form-horizontal" action="" method="POST">
                    <h3 class="heading3">Your Personal Details</h3>
                    <div class="registerbox">
                        <fieldset>
                        <div class="control-group">
                                <label class="control-label"><span class="red">*</span> User Name:</label>
                                <div class="controls">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text"  class="input-xlarge" name="txtUsername">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="red">*</span> First Name:</label>
                                <div class="controls">
                                    <input type="text"  class="input-xlarge" name="txtFirstName">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="red">*</span> Last Name:</label>
                                <div class="controls">
                                    <input type="text"  class="input-xlarge" name="txtLastName">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="red">*</span> Email:</label>
                                <div class="controls">
                                    <input type="text"  class="input-xlarge" name="txtEmail">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="red">*</span> Telephone:</label>
                                <div class="controls">
                                    <input type="text"  class="input-xlarge" name="txtPhoneNumber">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Fax:</label>
                                <div class="controls">
                                    <input type="text"  class="input-xlarge">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <h3 class="heading3">Your Password</h3>
                    <div class="registerbox">
                        <fieldset>
                            <div class="control-group">
                                <label  class="control-label"><span class="red">*</span> Password:</label>
                                <div class="controls">
                                    <input type="password"  class="input-xlarge" name="txtPassword">
                                </div>
                            </div>
                            <div class="control-group">
                                <label  class="control-label"><span class="red">*</span> Password Confirm::</label>
                                <div class="controls">
                                    <input type="password"  class="input-xlarge" name="txtRePass">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="pull-right">
                        <label class="checkbox inline">
                            <input type="checkbox" value="option2" >
                        </label>
                        I have read and agree to the <a href="#" >Privacy Policy</a>
                        &nbsp;
                        <input type="Submit" class="btn btn-orange" value="Register">
                    </div>
                </form>
                <div class="clearfix"></div>
                <br>
            </div>
        </div>
    </div>
</section>
@endsection