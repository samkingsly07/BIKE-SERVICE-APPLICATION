<!DOCTYPE html>
<html>
<head>
    <title>sent mail</title>
    <style>
        table{
         width:100%;
         table-layout: fixed;
       }
       .tbl-header{
         background-color: rgba(255,255,255,0.3);
        }
       .tbl-content{
         height:300px;
         overflow-x:auto;
         margin-top: 0px;
         border: 1px solid rgba(255,255,255,0.3);
        
         font-family: 'Roboto', 
       }
       th{
         padding: 20px 15px;
         text-align: center;
         font-weight: 800;
         font-size: 12px;
         color: #fff;
         text-transform: uppercase;
       }
       td{
         padding: 15px;
         text-align: center;
         vertical-align:middle;
         font-weight: 500;
         font-size: 12px;
         color: #fff;
         border-bottom: solid 1px rgba(255,255,255,0.1);
       }
       
               </style> 
</head>
<body>
    <!-- TABLE-->
    <table>
        <tr><thead>Name</thead><td>{{ $contact_data['name'] }}</td></tr>
        <tr><thead>Email</thead><td>{{ $contact_data['email'] }}</td></tr>
        <tr><thead>Message</thead><td>{{ $contact_data['message'] }}</td></tr>
    </table>
</body>
</html>