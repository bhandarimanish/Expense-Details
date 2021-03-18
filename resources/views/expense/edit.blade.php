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
  background-image: radial-gradient( circle 321px at 8.3% 75.7%,  rgba(209,247,241,1) 0%, rgba(249,213,213,1) 81% );;
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
<body style="background-color:#c8b9c9">
<h2 style="color:white"><center>Update Income and Expense Details</center></h2>
<div class="row justify-content-center">
@if(Session::has('msg'))
<p class="alert alert-success" style="color:green">{{ Session::get('msg') }}</p>
@endif
</div>
<div class="container">
  <form action="{{route('expense.update',$expense->id)}}" method="POST">
  @csrf
  @method('PUT')
  <label for="fname">Cash in  Hand</label><br>
  <input type="text" class=" @error('cashinhand') is-invalid @enderror" name="cashinhand" value="{{$expense->cashinhand}}" ><br>
  <div>
  @error('cashinhand')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
   </div>
   <label for="subject"> Details</label><br>
    <div class="form-inline" >
    <textarea class=" @error('details') is-invalid @enderror" name="details"   style="height:80px">{{$expense->details}}</textarea>
    @error('details')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
    </div>
    <label for="fname">Income Price</label>
    <label for="fname" style="margin-left:235px">Income Details</label><br>
    <div class="form-inline" style="display:flex">
    <input type="text" class=" @error('incomeprice') is-invalid @enderror" name="incomeprice" value="{{$expense->incomeprice}}" style="width: 20%;">
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
    <input type="text" class=" @error('incomedetails') is-invalid @enderror" name="incomedetails" value="{{$expense->incomedetails}}" style="width: 75%;"><br>
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
    <input type="text" class=" @error('expenseprice') is-invalid @enderror" name="expenseprice" value="{{$expense->expenseprice}}" style="width: 20%;">
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
    <input type="text" class=" @error('expensedetails') is-invalid @enderror" name="expensedetails"  value="{{$expense->expensedetails}}" style="width: 75%;"><br>
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
    <textarea class=" @error('resolution') is-invalid @enderror" name="resolution"  style="height:80px">{{$expense->resolution}}</textarea>
    @error('resolution')
    <span class="invalid-feedback" role="alert">
    <strong style="color:red;">{{ $message }}</strong>
     </span>
   @enderror
    </div>
    <input type="submit" value="Update">
    <a href="{{route('expense.index')}}" class="button" role= style="float:right">Back</a>
    </div>
  

  </form>
</div>
</body>
</html>