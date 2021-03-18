<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpenseDetail</title>
    <style>
    /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid blue; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #3bb3f9;
background-image: linear-gradient(20deg, #3bb3f9 0%, #87fff1 100%);

  padding: 20px;
}
.button {
  background-color: grey;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  float:right;
}
    </style>
</head>
<body style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
">
<h2 style="color:white"><center>Create Income and Expense Details</center></h2>
<div class="row justify-content-center">
@if(Session::has('message'))
<p class="alert alert-success" style="color:white">{{ Session::get('message') }}</p>
@endif
</div>
<div class="container">
  <form action="{{route('expense.store')}}" method="POST">
  @csrf
  <label for="fname">Cash in  Hand</label><br>
  <input type="text" class=" @error('cashinhand') is-invalid @enderror" name="cashinhand" placeholder="Price in RS" ><br>
  <div>
  @error('cashinhand')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
   <label for="subject">Details</label><br>
    <div class="form-inline" >
    <textarea class=" @error('details') is-invalid @enderror" name="details" placeholder="Detail about  every penny.... " style="height:80px"></textarea>
    @error('details')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
    </div>
    <label for="fname">Income Price</label>
    <label for="fname" style="margin-left:235px">Income Details</label><br>
    <div class="form-inline" style="display:flex">
    <input type="text" class=" @error('incomeprice') is-invalid @enderror" name="incomeprice" placeholder="Price in RS...." style="width: 20%;">
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
    <input type="text" class=" @error('incomedetails') is-invalid @enderror" name="incomedetails" placeholder="Detail of income....." style="width: 75%;"><br>
    </div>
    <div>
    @error('incomeprice')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
   <div>
   @error('incomedetails')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
    <label for="fname">Expense Price</label>
    <label for="fname" style="margin-left:235px">Expense Details</label><br>
    <div class="form-inline" style="display:flex">
    <input type="text" class=" @error('expenseprice') is-invalid @enderror" name="expenseprice" placeholder="Price in RS...." style="width: 20%;">
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
    <input type="text" class=" @error('expensedetails') is-invalid @enderror" name="expensedetails" placeholder="Detail of expense....." style="width: 75%;"><br>
    </div>
    <div>
    @error('expenseprice')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
   <div>
   @error('expensedetails')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
    <label for="subject">Resolution</label><br>
    <div class="form-inline" >
    <textarea class=" @error('resolution') is-invalid @enderror" name="resolution" placeholder="Expense which you should avoid...." style="height:80px"></textarea>
    @error('resolution')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
    </div>
    <input type="submit" value="Submit">
    <a href="{{route('expense.index')}}" class="button" role= style="float:right">Back</a>
    </div>
  

  </form>
</div>
</body>
</html>