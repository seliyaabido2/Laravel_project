<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" align="center" action="{{ url('ragister_post')}}">
{{ csrf_field() }}
<h1>ragister page</h1>

<label>Enter Name:</label>
<input type="text" name="name"><br><br>

<label>Enter Email:</label>
<input type="email" name="email"><br><br>

<label>Enter Age:</label>
<input type="text" name="age"><br><br>

<input type="submit" name="submit">
</form>
</body>
</html>

