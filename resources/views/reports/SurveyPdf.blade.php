<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Report</title>

    <style>
        body {
            border: 5px outset red;
            background-color: lightblue;
            text-align: center;
        }
        .custom-font {
            font-weight: bold;
        }


        table.blueTable {
            border: 1px solid #000000;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table.blueTable td,
        table.blueTable th {
            border: 1px solid #020202;
            padding: 3px 2px;
        }

        table.blueTable tbody td {
            font-size: 13px;
        }

        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #0a99f8;
            border-left: 2px solid #d0e4f5;
            font-size: 0.7em;
        }
    </style>
</head>
<body>
<div class="descriptions">
  <h4>Survey  Report</h4>
  <table class="blueTable">
     <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Survey Name</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
     </thead>
    <tbody>
        @foreach ($allsurveys as $surveys)
        @foreach ($surveys as $survey)
         <tr>
           <th scope="row"> <span class="badge badge-dark">{{$survey->id}}</span></th>
           <td>{{@$survey->category->title}}</td>
           <td>{{@$survey->question_name}}</td>
           <td>{{@$survey->answer->answer}}</td>
           <td>{{@$survey->name}}</td>
           <td>{{@$survey->email}}</td>
         </tr>
        @endforeach
        @endforeach
       </tbody>
  </table>
</body>
</html>
    {{-- <div class="card">
        @include('includes.flash-message')
        <div class="card-header">
          Survey  Reports
        </div>
        <div class="card-body">

            <table class="table table-bordered table-hovern table-sm">
                <thead>
                  <tr>
                    <th scope="col">
                      #
                    </th>
                    <th scope="col">Survey Name</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($allsurveys as $surveys)
                 @foreach ($surveys as $survey)
                  <tr>
                    <th scope="row"> <span class="badge badge-dark">{{$survey->id}}</span></th>
                    <td>{{@$survey->category->title}}</td>
                    <td>{{@$survey->question_name}}</td>
                    <td>{{@$survey->answer->answer}}</td>
                    <td>{{@$survey->name}}</td>
                    <td>{{@$survey->email}}</td>
                  </tr>
                 @endforeach
                 @endforeach
                </tbody>
              </table>

        </div>
    </div>        --}}

