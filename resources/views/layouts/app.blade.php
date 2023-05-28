<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gghmedcloud') }} - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    
  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        @include('layouts/header')
        <main class="py-4">
            @yield('content')
        </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                  $('#tabledata').DataTable({
                      paging: true,          // Enable pagination
                    pageLength: 10,        // Set the number of rows per page
                    select: true  
                  });
            });
            $(document).ready(function() {
                $('#tabledata').DataTable();
                let rowcount=0;
                // Add new paragraph
                var row_id=0; 
                $('#clonebutton').click(function() {
                // alert('idrees');
                var html =  `<div class="row d-flex d-inline-flex" id="interface-container_`+row_id+`">`;
                html+=`<div class="col-md-3 mt-2 p-0">
                <label for="medication_name" class="form-label m-0 strong fs-6">Name</label>
                <div id="medicinesug"></div>
                <input  autocomplete="off"  class="form-control shadow" onkeyup="GetProjectListDropdownByNamemed(this, `+row_id+`)" list="nameListmed" id="medication_name" class="form-control rounded-end rounded-5" name="medication_name[]" placeholder="Search Medicine" style="border-radius: 0px;">
                <datalist id="nameListmed">
                </datalist>
                <div class="d-flex">
                <input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled>
                <input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled>
                </div>
                </div>
                <div class="col-md-1 mt-2 p-0">
                <label for="medication_duration" class="form-label m-0 strong fs-6">Duration</label><input type="text" class="form-control shadow" id="medication_duration_`+row_id+`" name="medication_duration_sequence[]" />
                <select class="form-select" id="medication_duration_number_`+row_id+`"  name="medication_duration_number[]">
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
                <label for="medication_dosage" class="form-label m-0 strong fs-6">Dosage</label><input type="text" class="form-control shadow" id="medication_dosage_`+row_id+`" name="medication_dosage_input[]" />
                <select class="form-select" id="medication_dosage_select_`+row_id+`" name="medication_dosage_select[]">
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
                <select class="form-select" name="medication_route[]" id="route_`+row_id+`">
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
                <label for="medication_frequency" class="form-label m-0 strong fs-6">Instruction</label>
                <select class="form-select" name="medication_frequency[]" id="medication_frequency_`+row_id+`">
                    <option value="">Select</option>
                        <option value="صرف ایک بار">Only once</option>
                        <option value="دن میں ایک دفحہ">Once a day</option>
                        <option value="دن میں دو بار">Twice a day</option>
                        <option value="دن میں تین بار">Thrice a day</option>
                        <option value="دن میں چار بار">Four times a day</option>
                        <option value="سونے سے پہلے">Before Bed</option>
                        <option value="ہر گھنٹے">Every hour</option>
                        <option value="ہر 2 گھنٹے">Every 2 hours</option>
                        <option value="ہر 3 گھنٹے">Every 3 hours</option>
                        <option value="ہر 4 گھنٹے بعد">Every 4 hours</option>
                        <option value="ہر 6 گھنٹے بعد">Every 6 hours</option>
                        <option value="ہر 8 گھنٹے">Every 8 hours</option>
                        <option value="ہر 12 گھنٹے">Every 12 hours</option>
                        <option value="ہر دوسرے دن">Every Other day</option>
                        <option value="ہر 3 دن">Every 3 days</option>
                        <option value="ہفتے میں ایک بار">Once a Week</option>
                        <option value="ہفتے میں دو دفعہ">Twice a Week</option>
                        <option value="ہفتے میں تین بارk">Thrice a Week</option>
                        <option value="ہر 10 دن بعد">Every 10 Days</option>
                        <option value="ہر 15 دن بعد">Every 15 Days</option>
                        <option value="مہینے میں ایک بار">Once a month</option>
                        <option value="3 مہینے میں ایک بار">Once a 3 months</option>
                        <option value="سال میں ایک بار">Once a Year</option>
                        <option value="ہر صبح">Every Morning</option>
                        <option value="ہر شام">Every Evening</option>
                        <option value="ہر رات">Every Night</option>
                        <option value="اگر ضرورت ہو تو">If needed</option>
                        <option value="ناشتے سے پہلے">Before Breakfast</option>
                        <option value="مسلسل">Continously</option>
                        <option value="دوپہر کے کھانے سے پہلے">Before Lunch</option>
                        <option value="دوپہر کے کھانے کے بعد">After Lunch</option>
                        <option value="کھانے سے پہلے">Before Meal</option>
                        <option value="کھانے کے بعد">After Meal</option>
                        <option value="ڈنر سے پہلے">Before Dinner</option>
                        <option value="ڈنر کے بعد">After Dinner</option>
                        <option value="جیسا کہ مشورہ دیا گیا ہے۔">As Advised</option>
                        <option value="مہینے میں دو بار">Twice a month</option>
                        <option value="نا شتے کے بعد">After Breakfast</option>
                        <option value="ناشتہ اور لنچ سے پہلے">Before Breakfast and Lunch</option>
                        <option value="لنچ اور ڈنر سے پہلے">Before Lunch and Dinner</option>
                        <option value="ناشتہ اور رات کے کھانے سے پہلے">Before Breakfast and Dinner</option>
                        <option value="ناشتہ اور دوپہر کے کھانے کے بعد">After Brealfast and Lunch</option>
                        <option value="لنچ اور ڈنر کے بعد">After Lunch and Dinner</option>
                        <option value="ناشتہ، لنچ اور ڈنر سے پہلے">Before Breakfast, Lunch & Dinner</option>
                        <option value="ناشتے کے بعد، دوپہر کا کھانا اور رات کا کھانا دوپہر کو">After Breakfast, Lunch & Dinner at noon</option>
                        <option value="دوپہر اور شام">Noon and Evening</option>
                        <option value="صبح، شام، رات">Morning, Evening, Night</option>
                        <option value="صبح اور دوپہر">Morning and Noon</option>
                        <option value="صبح 6 بجے، 10 بجے، دوپہر 2 بجے، شام 6 بجے، رات 10 بجے">at 6am, 10am, 2pm, 6pm, 10pm</option>
                        <option value="دن 21 تک دن میں تین بار , پھر اگلے 2 مہینوں تک صرف رات کو">Thrice a day for 21 days, then only at night for next 2 months</option>
                        <option value="دن21 کے لیے دن میں دو بار، پھر اگلے 2 مہینوں کے لیے صرف رات کو">Twice a day for 21 days, then only at night for next 2 months</option>
                        <option value="دن میں دو بار 21 دن کے لیے، پھر اگلے 2 ماہ کے لیے 1 دن کو چھوڑ کر 1 کیپسول لیں۔">Twice a day for 21 days, then onwards for next 2 months take 1 capsule by skipping 1 day</option>
                        <option value="ہفتے میں دو بار ڈائیلاسز کے بعد">Twice a week after dialysis</option>
                        <option value="ہفتے میں تین بار ڈائیلاسز کے بعد">Thrice a week after dialysis</option>
                        <option value="ڈبل لیمن میں ڈائلیسس کے بعد">After dialysis in double lumen</option>
                        <option value="ڈائیلاسز کے آغاز پر">At the start of dialysis</option>
                        <option value="ڈائیلاسز کے دوران">During dialysis</option>
                        <option value="ڈائیلاسز سے پہلے">Before dialysis</option>
                        <option value="پہلے انجکشن اب، پھر 1 ماہ بعد، اگلا 2 ماہ کے آخر میں، تیسرا انجیکشن 6 ماہ کے آخر میں">First injection now, then after 1 months, next at 2 months end, 3rd injection at 6 months end</option>
                        <option value="سال میں ایک بار">Once a year</option>
                        <option value="اب ایک بار انجکشن لگائیں، ایک مہینے بعد">Once injection now, one after a month</option>
                        <option value="اب ایک بار انجیکشن لگائیں، ایک مہینے بعد، اگلا 6 ماہ بعد">Once injection now, one after a month, next after 6 months</option>
                                                                
                </select>
                </div>
                <div class="col-md-2 mt-2 p-0"><label for="medication_instruction" class="form-label m-0 strong fs-6">Remarks</label><input type="text" class="form-control shadow" id="medication_instruction_`+row_id+`" name="medication_instruction[]" /></div>
                <div class="col-md-1 mt-2 p-0 d-flex align-items-center">
                <button type="button" class="btn btn-default delete-button btnremove" id="deletebutton" onclick="Remove(`+row_id+`)" name="medication_del"><i class="bi bi-trash3 fs-5"></i></button>
                </div>`;
                html+=`</div>`;
                $('#parent-container').append(html); 
                
                row_id++;
                });  
            });
            function Remove(id) {
            $(`#interface-container_`+id+``).remove();
            }
            
            function closepoup() { 
            dialog('close');
            }
        </script>
    </body>
</html>
