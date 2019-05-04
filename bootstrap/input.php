<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Belajar Bootstrap 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	
	<!-- Menyisipkan jquery -->
    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>welcome to my web</h1>
                <div class="lead">aku sedang belajar bootstrap 4</div>
            </div>
        </div>
    </div>
</div>
<div class="container">       
  <h2>Form control: input</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
