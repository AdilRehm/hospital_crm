<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gghmedcloud') }} - @yield('title')</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!--Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fs-4 text-white" href="{{ url('/') }}">
                    <strong>{{ config('app.name', 'Gghmedcloud')}}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" aria-current="page" href="/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/medicine">Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/viewmedicine">View Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/patient">Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/viewpatient">View Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/discharge">Discharge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/register">User Role</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown float-end">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script>
$(document).ready(function() {
    $.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $('#inputField').on('input', function() {
      var data = $(this).val();
      if (data.length >= 3)
        {
          $.ajax({
            url: '/api/viewpatient', // replace with your own URL or API endpoint
            method: 'POST',
            data: {data: data},
            success: function(response)
            {
              var html = '<ul>';
              for (var i = 0; i < response.length; i++) {
                html += '<li>' + response[i].patient_name + '</li>';
              }
              html += '</ul>';
              $('#suggestions').html(html);
              $('#suggestions').show();
            }
          });
        }
      else
      {
        $('#suggestions').hide();
      }
    });

  $(document).on('click', '#suggestions li', function() {
    var suggestion = $(this).text();
    $('#inputField').val(suggestion);
    $('#suggestions').hide();
  });

  // medcine suggestion code 
  $('#medication_name').on('input', function() {
    var data = $(this).val();
    if (data.length >= 3) {
      $.ajax({
        url: '/api/viewmedicine', // replace with your own URL or API endpoint
        method: 'POST',
        data: {data: data},
        success: function(response) {
          var html = '<ul>';
          for (var i = 0; i < response.length; i++) {
            html += '<li>' + response[i].medicine_name + '</li>';
          }
          html += '</ul>';
          $('#medicinesug').html(html);
          $('#medicinesug').show();
        }
      });
    } else {
      $('#medicinesug').hide();
    }
  });

  $(document).on('click', '#medicinesug li', function() {
    var suggestionmed = $(this).text();
    $('#medication_name').val(suggestionmed);
    $('#medicinesug').hide();
  });

});
  document.getElementById("dischargeprint").addEventListener("click",function(event){
  event.preventDefault();
  });
  function openPopup(){
    var model =document.createElement('div');
    model.style.position="fixed";
    model.style.top="0";
    model.style.left = "0";
    model.style.width = "100%";
    model.style.height = "100%";
    model.style.backgroundColor = "rgba(0,0,0,0.5)";
    model.style.display = "flex";
    model.style.justifyContent = "center";
    model.style.alignItems = "center";

    var frame=document.createElement("iframe");
    frame.src="dischargeslip";
    frame.style.width="80%";
    frame.style.height="80%";
    model.appendChild(frame);
    document.body.appendChild(model);
  }
  function printArea() {
        var printContents = document.getElementById("printarea").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        var noPrintElements = document.querySelectorAll('.no-print');
    for (var i = 0; i < noPrintElements.length; i++) {
        noPrintElements[i].remove();
    }
        window.print();
        document.body.innerHTML = originalContents;

  }
$(document).ready(function() {
    $('#clonebutton').click(function(e) {
    e.preventDefault();
    // Your code here
  });
  let rowcount=0;
  // Add new paragraph

  var row_id=0; 
  $('#clonebutton').click(function() {
    // alert('idrees');
    var html =  `<div class="row d-flex d-inline-flex" id="interface-container_`+row_id+`">`;
      html+=`<div class="col-md-3 mt-2 p-0">
        <label for="medication_name" class="form-label m-0 strong fs-6">Name</label><input type="text" class="form-control shadow" autocomplete="off" id="medication_name" name="medication_name[]" />
        <div id="medicinesug"></div>
        <div class="d-flex"><input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled /><input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled /></div>
    </div>
    <div class="col-md-1 mt-2 p-0">
        <label for="medication_duration" class="form-label m-0 strong fs-6">Duration</label><input type="text" class="form-control shadow" id="medication_duration" name="medication_duration_sequence[]" />
        <select class="form-select" name="medication_duration_number[]">
            <option value="">Select</option>
            <option value="days">Day(s)</option>
            <option value="weeks">Week(s)</option>
            <option value="months">Month(s)</option>
            <option value="continously">Continously</option>
            <option value="when required">When Required</option>
            <option value="stat">STAT</option>
            <option value="prn">PRN</option>
        </select>
    </div>
    <div class="col-md-1 mt-2 p-0">
        <label for="medication_dosage" class="form-label m-0 strong fs-6">Dosage</label><input type="text" class="form-control shadow" id="medication_dosage" name="medication_dosage_input[]" />
        <select class="form-select" name="medication_dosage_select[]">
            <option value="">Select</option>
            <option value="capsules">Capsule(s)</option>
            <option value="tablet">Tablet(s)</option>
            <option value="ml">ml</option>
            <option value="mg">mg</option>
            <option value="IU">IU</option>
            <option value="drop">DROP</option>
            <option value="tablespoon">Tablespoon</option>
            <option value="teaspoon">Teaspoon(s)</option>
            <option value="units">Unit(s)</option>
            <option value="puff">Puff(s)</option>
            <option value="sachet">Sachet</option>
            <option value="ijection">Ijection</option>
            <option value="dose step">Dose Step</option>
            <option value="dropper">Dropper</option>
            <option value="ml/h">ml/h</option>
        </select>
    </div>
    <div class="col-md-2 mt-2 p-0">
        <label for="route_" class="form-label m-0 strong fs-6">Route</label>
        <select class="form-select" name="medication_route[]" id="route_">
            <option value="">Select Intake</option>
            <option value="oral">Oral</option>
            <option value="nasal">Nasal</option>
            <option value="Intravenous">Intravenous</option>
            <option value="topical">Topical</option>
            <option value="Intraosseous">Intraosseous</option>
            <option value="Intrathecal">Intrathecal</option>
            <option value="Intraperitoneal">Intraperitoneal</option>
            <option value="Intradernal">Intradernal</option>
            <option value="Nasogastric">Nasogastric</option>
            <option value="Sub Lingual">Sub Lingual</option>
            <option value="Per Rectum">Per Rectum</option>
            <option value="inhalation">Inhalation</option>
            <option value="Intraoccular">Intraoccular</option>
        </select>
    </div>
    
    <div class="col-md-2 mt-2 p-0">
        <label for="medication_frequency" class="form-label m-0 strong fs-6">Frequency</label>
        <select class="form-select" name="medication_frequency[]" id="medication_frequency">
            <option value="">Select</option>
            <option value="oral">Only once</option>
            <option value="nasal">Once a day</option>
            <option value="Intravenous">Twice a day</option>
            <option value="topical">Thrice a day</option>
            <option value="Intraosseous">Four times a day</option>
            <option value="Intrathecal">Before Bed</option>
            <option value="Intraperitoneal">Every hour</option>
            <option value="Intradernal">Every 2 hours</option>
            <option value="Nasogastric">Every 3 hours</option>
            <option value="Sub Lingual">Every 4 hours</option>
            <option value="Per Rectum">Every 6 hours</option>
            <option value="inhalation">Every 8 hours</option>
            <option value="Intraoccular">Every 12 hours</option>
            <option value="oral">Every Other day</option>
            <option value="nasal">Every 3 days</option>
            <option value="Intravenous">Once a Week</option>
            <option value="topical">Twice a Week</option>
            <option value="Intraosseous">Thrice a Week</option>
            <option value="Intrathecal">Every 10 Days</option>
            <option value="Intraperitoneal">Every 15 Days</option>
            <option value="Intradernal">Once a month</option>
            <option value="Nasogastric">Once a 3 months</option>
            <option value="Sub Lingual">Once a Year</option>
            <option value="Per Rectum">Every Morning</option>
            <option value="inhalation">Every Evening</option>
            <option value="Intraoccular">Every Night</option>
            <option value="oral">If needed</option>
            <option value="nasal">Before Breakfast</option>
            <option value="Intravenous">Continously</option>
            <option value="topical">Before Lunch</option>
            <option value="Intraosseous">After Lunch</option>
            <option value="Intrathecal">Before Meal</option>
            <option value="Intraperitoneal">After Meal</option>
            <option value="Intradernal">Before Dinner</option>
            <option value="Nasogastric">After Dinner</option>
            <option value="Sub Lingual">As Advised</option>
            <option value="Per Rectum">Twice a month</option>
            <option value="inhalation">After Breakfast</option>
            <option value="Intraoccular">Before Breakfast and Lunch</option>
            <option value="oral">Before Lunch and Dinner</option>
            <option value="nasal">Before Breakfast and Dinner</option>
            <option value="Intravenous">After Brealfast and Lunch</option>
            <option value="topical">After Lunch and Dinner</option>
            <option value="Intraosseous">Before Breakfast, Lunch & Dinner</option>
            <option value="Intrathecal">After Breakfast, Lunch & Dinner at noon</option>
            <option value="Intraperitoneal">Noon and Evening</option>
            <option value="Intradernal">Morning, Evening, Night</option>
            <option value="Nasogastric">Morning and Noon</option>
            <option value="Sub Lingual">at 6am, 10am, 2pm, 6pm, 10pm</option>
            <option value="Per Rectum">Thrice a day for 21 days, then only at night for next 2 months</option>
            <option value="inhalation">Twice a day for 21 days, then only at night for next 2 months</option>
            <option value="Intraoccular">Twice a day for 21 days, then onwards for next 2 months take 1 capsule by skipping 1 day</option>
            <option value="oral">Twice a week after dialysis</option>
            <option value="nasal">Thrice a week after dialysis</option>
            <option value="Intravenous">After dialysis in double lumen</option>
            <option value="topical">At the start of dialysis</option>
            <option value="Intraosseous">During dialysis</option>
            <option value="Intrathecal">Before dialysis</option>
            <option value="Intraosseous">First injection now, then after 1 months, next at 2 months end, 3rd injection at 6 months end</option>
            <option value="Intrathecal">Once a year</option>
            <option value="Intrathecal">Once injection now, one after a month</option>
            <option value="Intrathecal">Once injection now, one after a month, next after 6 months</option>
        </select>
    </div>
    <div class="col-md-2 mt-2 p-0"><label for="medication_instruction" class="form-label m-0 strong fs-6">Instruction</label><input type="text" class="form-control shadow" id="medication_instruction" name="medication_instruction[]" /></div>
    <div class="col-md-1 mt-2 p-0 d-flex align-items-center">
        <button type="button" class="btn btn-default delete-button btnremove" id="deletebutton" onclick="Remove(`+row_id+`)" name="medication_del"><i class="bi bi-trash3 fs-5"></i></button>
    </div>`;
    html+=`</div>`;
    $('#parent-container').append(html); 

    row_id++;
  
    

    // onclick="Remove(`+row_id+`)

  //   $(`#deletebutton_`+row_id+``).click(function() {
  //   //$('#parent-container :last-child()').remove();
  //   $(`#interface-container_`+id+``).remove();
  // });
  });


  // function Remove(id){
  //   $(`#interface-container_`+id+``).remove();
  // }


  
  // Remove last paragraph
  // $(`#deletebutton`).click(function() {
  //   //$('#parent-container :last-child()').remove();
  //   //$(`#interface-container_`+id+``).remove();
  //   // function Remove(id) {
  //   $(`#interface-container_`+id+``).remove();
  //   //
  // });
  
});
</script>


<script>
    function Remove(id) {
    $(`#interface-container_`+id+``).remove();
}

  function closepoup() { 
    dialog('close');
   }

</script>

</body>
</html>
