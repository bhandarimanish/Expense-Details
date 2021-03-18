<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Details</title>
    <style>
    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background-color: #8EC5FC;
background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);


}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding-top:15px;
    padding-bottom:10px;
    background-color:red;
    background-color: #a0cdf9;
background-image: linear-gradient(193deg, #a0cdf9 0%, #c7abe2 100%);

}

/* Table Styles */

.table-wrapper{
    margin: 100px 200px 200px;

    
}

.fl-table {
    border-radius: 5px;
    font-size: 15px;
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
    font-size: 12px;  
    white-space:pre-line;
    font-size: 16px;
    
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
.buttons {
  background-color:grey;
  color:white ;
  padding: 6px 10px;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  cursor: pointer;
  margin-top:14px;
}
    </style>
</head>
<body>
<h2>Details of your daily expenses</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Id</th>
            <th >Previous Capital</th>
            <th >Current Capital</th>
            <th >Income Details</th>
            <th >Expense Details</th>
            <th >Resolution</th>
            <th >Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="background-color:#e3e0ff">{{$expense->id}}</td>
            <td style="color:#ff4108;font-size:14.5px;">Rs.{{$expense->cashinhand}}</td>
            <td style="color:#002fff;font-size:15px;">Rs.{{$expense->cashinhand+$expense->incomeprice-$expense->expenseprice}}</td>
            <td>
           <p style="font-size:15px">{{$expense->incomedetails}}</p>
            </td>
            <td>{{$expense->expensedetails}}</td>
            <td>{{$expense->resolution}}</td>
            <td>{{ $expense->created_at->format('Y-m-d') }}</td>
            </tr>
            </tbody>
    </table>
     
    <a href="{{route('expense.index')}}" class="buttons">Back to Index</a>
</div>

</body>
</html>