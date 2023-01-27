
<html>
    <head>
        <style>
            * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
        </style>
    </head>
    <body>
  



<form action="{{route('login') }}" method="post" >
@csrf
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to enter our Page</p>
    <hr>
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" placeholder="Enter Email" id="email" required class="form-control" >
    @if ($errors->has('email'))
    <div class="error">
        {{ $errors->first('email') }}
    </div>
    @endif
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
    @if ($errors->has('password'))
        <div class="error">
            {{ $errors->first('password') }}
        </div>
        @endif


        <label for="role"><b>Role</b></label>
    <select name="role" id="role" required class="form-control">
  <option value="admin">Admin</option>
  <option value="employee">Employee</option>
  <option value="advertiser">Advertiser</option>

</select>
    @if ($errors->has('email'))
    <div class="error">
        {{ $errors->first('email') }}
    </div>
    @endif
    <button type="submit" name="login" class="registerbtn">login</button>
  </div>
</form>
</body>

</html>