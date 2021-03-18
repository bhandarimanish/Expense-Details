<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense_Details</title>
    <style>
    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background-image: url('a.jpg');
      /* Full height */
  height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
    
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding-top:15px;
    padding-bottom:10px;
    background-image: url('b.jpg');
    color:white;

}

/* Table Styles */

.table-wrapper{
    margin: 10px 100px 100px;

    
}

.fl-table {
    border-radius: 5px;
    font-size: 14px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
    width: 100%;
}

.fl-table td, .fl-table th {
    text-align: center;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 14px;      
}

.fl-table thead th {
    color: #ffffff;
    background: #64deda;
    padding: 8px;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
.button {
  background-color:#4FC3A1;
  border: blue;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:100px;
  cursor: pointer;
  margin-top:20px;
}
.buttons {
  background-color:skyblue;
  border: blue;
  color: ;
  padding: 6px 10px;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  cursor: pointer;
}
    </style>
</head>
<body>
<div class="row justify-content-center">
@if(Session::has('message'))
<p class="alert alert-success" style="color:white;">{{ Session::get('message') }}</p>
@endif
</div>
<h2>Track your Money</h2>
    
    <a href="{{route('expense.create')}}" class="button" role= style="float:right">Create</a>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Id</th>
            <th >Capital</th>
            <th >Income</th>
            <th >Expense</th>
            <th >Profit/Loss</th>
            <th >Details</th>
            <th >Created At</th>
            <th >In Hand</th>
            <th>Details</th>
            <th style="background-color:grey;">Edit</th>
            <th style="background-color:grey;">Delete</th>
        </tr>
        </thead>
        <tbody>
       
        @foreach($expenses as $key=>$expense)
        <tr>
            <td style="background-color:#e3e0ff">{{$key+1}}</td>
            <td style="">Rs.{{$expense->cashinhand}}</td>
            <td>Rs.{{$expense->incomeprice}}</td>
            <td>Rs.{{$expense->expenseprice}}</td>
            <td>
            @if($expense->incomeprice>$expense->expenseprice)
           <p style="color:white;background-color:#06c43c;font-size:15px">Rs.{{$expense->incomeprice-$expense->expenseprice}}</p>
            @else
            <p style="color:white;background-color:#9e1d16;font-size:14px">Rs.{{$expense->incomeprice-$expense->expenseprice}}</p>
            @endif
            </td>
            <td>{{$expense->details}}</td>
            <td>{{ $expense->created_at->format('Y-m-d') }}</td>
            <td style="color:#002fff;font-size:15px;">Rs.{{$expense->cashinhand+$expense->incomeprice-$expense->expenseprice}}</td>
            <td> <a href="{{route('expense.show',$expense->id)}}" class="buttons" role= style="float:">View Details</a></td>
            <td>
      <a  class="inlane-block" href="{{route('expense.edit',[$expense->id])}}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#03853d" class="bi bi-pencil-square " viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </a>
      </td>
      <td>
        <form id="delete-form{{$expense->id}}" method="POST" action="{{route('expense.destroy',$expense->id)}}"> 
            @method("DELETE")
            @csrf
            <a href="#" onclick="if(confirm('Do you really wanna delete?'))
            {
                event.preventDefault();
                document.getElementById('delete-form{{$expense->id}}').submit()
            }
            else {
            event.preventDefault();

            }
            ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
        </a>
        </form>
        </td>
        </tr>
        @endforeach 
        <tbody>
    </table>
</div>

</body>
</html>