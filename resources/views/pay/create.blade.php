<!DOCTYPE html>
<html>
<body>

<form action="{{ url('pay/store') }}" method="post" >
	@csrf
  <input type="submit" value="Submit">
</form>

</body>
</html>