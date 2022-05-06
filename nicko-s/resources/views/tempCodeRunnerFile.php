<?php
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="/css/register.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

</head>

<body class="bg-register">
<div class="container">


        <h3>Register</h3>
        
            <p class="text-success">{{session('success')}}</p>

    
        <form method="post" action="{{url('admin/customer')}}">
            @csrf
        <table class="table table-bordered">
            <tr>
                <th>FIRST NAME <span class="text-danger"> *</span></th>
                <td><input required type="text" class="form control" name="firstname"></td>
            </tr>

            <tr>
                <th>MIDDLE NAME <span class="text-danger"> *</span></th>
                <td><input required type="text" class="form control" name="middlename"></td>
            </tr>

            <tr>
                <th>LAST NAME <span class="text-danger"> *</span></th>
                <td><input required type="text" class="form control" name="lastname"></td>
            </tr>

            <tr>
                <th>EMAIL <span class="text-danger"> *</span></th>
                <td><input required type="email" class="form control" name="email"></td>
            </tr>

            <tr>
                <th>PASSWORD <span class="text-danger"> *</span></th>
                <td><input required type="password" class="form control" name="password"></td>
            </tr>

            <tr>
                <th>RE-ENTER PASSWORD <span class="text-danger"> *</span></th>
                <td><input required type="password" class="form control" name="repassword"></td>
            </tr>

            <tr>
                <input type="hidden" name="ref" value="front"/>
                <td><input type="submit" class="btn btn-primary"/></td>
            </tr>
        </table>
        </form> 
</div>

</body>
</html>