
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

    <span style="color:red"><?php if(isset($_SESSION['error'])){
     echo $_SESSION['error'];   }?></span>
<form action="{{route('register') }}" method="post">
    @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>Name</b></label>
    <input type="text" name="name" placeholder="Enter Name" id="email" required class="form-control">
    @if ($errors->has('name'))
    <div class="error">
        {{ $errors->first('name') }}
    </div>
    @endif
   
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" placeholder="Enter Email" id="email" required class="form-control">
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
    @if ($errors->has('role'))
    <div class="error">
        {{ $errors->first('role') }}
    </div>
    @endif
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="save_user">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="{{route('/login') }}">Sign in</a>.</p>
  </div>
</form>
</body>
</html>