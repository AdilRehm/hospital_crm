@extends('layouts.app')
@section('title', 'Discharge')
@section('content')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<input class="" type="text" hidden id="autocomplete-input">
<ul id="suggestions"></ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<script>
    function GetProjectListDropdownByName(event,var_this){
        var project_input_value = var_this.value;
        var formData = new FormData();
        formData.append('term', project_input_value);
        $.ajax({
            type: "POST",
            //  url : '/viewpatient'+ crsr,
            url: '/get_data'+'?_token=' + '{{ csrf_token() }}',
            data:formData,
            cache: false,
            contentType: false, 
            processData: false,
            dataType:'json',
            success:function(data){ 
                console.log(data);
                $('#nameList').empty();
                $("#discharge_patient_name_in").val(data[0].id)
                $.each(data, function (key, value) {   
                    $('#nameList').append(`<option data-id="`+value.id+`" value="`+value.patient_name+`">`+value.id+' '+value.patient_name+' '+value.patient_number+`</option>`);
                });
            }
        });
    }
    // function getID() {  
        // var id = $(this).val();
        // var selectedOptionId = $('#nameList option[value="' + id + '"]').data('id'); // Get the ID of the selected option
        // console.log(id);
    // }
    $(document).ready(function() {
        $('#autocomplete-input').keyup(function() {
            var term = $(this).val();
            $.ajax({
                url: '/discharge',
                data: { term: term },
                dataType: 'json',
                success: function(suggestions) {
                    
                    // $.each(suggestions, function(index, suggestion) {
                    //     $('#suggestions').append('<li>' + suggestion.name + '</li>');
                    // });
                }
            });
        });
        setTimeout(() => {
            $("#clonebutton").trigger('click')
        }, 2000);
    });

// medicne value fetching 
function GetProjectListDropdownByNamemed(var_this, id){
    var project_input_value = var_this.value;
    var formData = new FormData();
    console.log(var_this);
    formData.append('term', project_input_value);
    $.ajax({
        type: "POST",
        url: '/get_med'+'?_token=' + '{{ csrf_token() }}',
        data:formData,
        cache: false,
        contentType: false, 
        processData: false,
        dataType:'json',
        success:function(data){ 
            $('#nameListmed').empty();
            $("#medication_duration_"+id).val(data[0].medicine_duration_sequence)
            $("#medication_dosage_"+id).val(data[0].medicine_dosage_input)
            $("#route_"+id).val(data[0].medicine_route)
            $("#medication_frequency_"+id).val(data[0].medicine_instruction)
            $("#medication_instruction_"+id).val(data[0].medicine_remarks)
            
            // $("#medication_dosage_select_"+id).val(data[0].medicine_duration_sequence)
            // $("#medication_duration_number_"+id).val(data[0.medicine_dosage_input])

            Object.keys(data).forEach(key => {
            $('#nameListmed').append(`<option value="`+data[key].medicine_name+`" data-xyz=`+data[key].id+`></option>`);
            });
        }
    });
}



    $(document).ready(function() {
    $('#autocomplete-input').keyup(function() {
        var term = $(this).val();
        $.ajax({
            url: '/discharge',
            data: { term: term },
            dataType: 'json',
            success: function(suggestions) {
                
                // $.each(suggestions, function(index, suggestion) {
                //     $('#suggestions').append('<li>' + suggestion.name + '</li>');
                // });
            }
        });
    });
});

</script>


    <div class="container-fluid">
        <form id="dischargeform" method="POSt" action="/discharge_csutomer">
            @csrf
            <div class="row d-flex align-content-center">
                <h1 class="col-12 pb-2">Add Health Record</h1>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row grid gap-2">
                        <div class="col-md-auto col-sm-12">
                            <div class="input-group">
                            
                            <input autocomplete="off"  class="form-control form_control_datalist search_project_name" value="{{@$patient->patient_name}}" onkeyup="GetProjectListDropdownByName(event,this)" list="nameList" id="getProjectList_byName" class="form-control rounded-end rounded-5" placeholder="Search By Name, Mr#, or Phone" style="border-radius: 0px;">
                            <input type="text" hidden name="discharge_patient_name" id="discharge_patient_name_in" value="{{@$patient->id}}">
                            <datalist id="nameList">
                            </datalist>

                            {{-- <input type="text" id="inputField" autocomplete="off" class="form-control rounded-end rounded-5" name="discharge_patient_name" placeholder="Search By Name, Mr#, or Phone">
                            <div id="suggestions"></div> --}}
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-12 d-none d-md-block">
                            <button class="btn btn-primary"><strong>Add Patient</strong><i class="bi bi-plus"></i></button>
                        </div>
                        {{-- <div class="col-md-auto col-sm-6 d-flex align-items-center">
                            <label class="form-label me-1 mt-2" for="doa">Date&nbsp;of&nbsp;Admission</label>
                            <input type="date" class="form-control rouded rounded-5" id="doa" name="discharge_admission_date">
                        </div>
                        <div class="col-md-auto col-sm-6 d-flex align-items-center">
                            <label class="form-label me-1 mt-2" for="dod">Date&nbsp;of&nbsp;Discharge</label>
                            <input type="date" class="form-control rouded rounded-5" id="dod" name="discharge_discharge_date">
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body ms-3 my-3">
                    <div class="accordion row" id="accordionExample">
                        <div class="col-auto p-0">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bi bi-file-plus-fill fs-4"></i>Prescription
                                </button>
                            </h2>
                        </div>
                        <div class="col-auto p-0">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-bag-plus-fill fs-4"></i>Medication
                                </button>
                            </h2>
                        </div>
                        <div class="row">
                            <!-- Prescription medicine list form-->
                            <div class="col-md-12">
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row border">
                                        <div class="col-md-12 fs-5 p-0">
                                            <label>Co-Morbidity</label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="DIM" name="prescription_corbidity[]" id="dimcheck">
                                            <label class="form-check-label fs-5" for="dimcheck">
                                                DIM
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="HTN" name="prescription_corbidity[]" id="vtncheck">
                                            <label class="form-check-label fs-5" for="vtncheck">
                                                HTN
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="IHD" name="prescription_corbidity[]" id="ihdcheck">
                                            <label class="form-check-label fs-5" for="ihdcheck">
                                                IHD
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="CCF" name="prescription_corbidity[]" id="ccfcheck">
                                            <label class="form-check-label fs-5" for="ccfcheck">
                                                CCF
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="CVA" name="prescription_corbidity[]" id="cvacheck">
                                            <label class="form-check-label fs-5" for="cvacheck">
                                                CVA
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="Dyslipidemia" name="prescription_corbidity[]" id="Dyslipidemiacheck">
                                            <label class="form-check-label fs-5" for="Dyslipidemiacheck">
                                                Dyslipidemia
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="Smoking" name="prescription_corbidity[]" id="smokingcheck">
                                            <label class="form-check-label fs-5" for="smokingcheck">
                                                Smoking
                                            </label>
                                        </div>
                                        <div class="form-check col-6 col-md-3">
                                            <input class="form-check-input fs-5" type="checkbox" value="COPD/Asthma" name="prescription_corbidity[]" id="copd/asthmacheck">
                                            <label class="form-check-label fs-5" for="copd/asthmacheck">
                                                COPD/Asthma
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-0 mt-2">
                                            <input type="textarea" class="form-control shadow" name="prescription_other" placeholder="other">
                                        </div>
                                        <div class="col-md-12 mt-2 p-0">
                                            <label for="final_diagnose" class="form-label m-0 strong fs-6"><b>Final Diagnosis</b></label>
                                            <input type="text" class="form-control shadow" id="final_diagnose" name="prescription_final_diagnosis">
                                        </div>
                                        <div class=" col-md-12mt-2 p-0">
                                            <label for="presenting_complaint" class="form-label m-0 strong fs-6"><b>Presenting Complaint</b></label>
                                            <input type="text" class="form-control shadow" id="presenting_complaint" name="prescription_presenting_complaint">
                                        </div>
                                        <div class="col-md-12 mt-2 p-0">
                                            <label for="hospitalstay" class="form-label m-0 strong fs-6"><b>Brief Notes of Hospital Stay</b></label>
                                            <input type="text" class="form-control shadow" id="hospitalstay" name="prescription_notes_of_hospital_stay">
                                        </div>
                                        <div class="col-md-12 mt-2 p-0">
                                            <label for="significant_labs" class="form-label m-0 strong fs-6"><b>Significant Labs</b></label>
                                            <input type="text" class="form-control shadow" id="significant_labs" name="prescription_significant_labs">
                                        </div>
                                        <div class="col-md-12 mt-2 p-0">
                                            <label for="significant_past_history" class="form-label m-0 strong fs-6"><b>Significant Past History</b></label>
                                            <input type="text" class="form-control shadow" id="significant_past_history" name="prescription_significant_past_history">
                                        </div>
                                        <div class="col-md-12 mb-3 mt-2 p-0">
                                            <label for="significant_past_history" class="form-label m-0 strong fs-6"><b>Follow Up Instructions</b></label>
                                            <div class="row ps-3">
                                                <div class="form-check col-md-3">
                                                    <input class="form-check-input fs-6" type="checkbox" value="1" name="prescription_follow_up_instructions[]" id="three_days">
                                                    <label class="form-check-label fs-6" for="three_days">
                                                    تین دن کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-3">
                                                    <input class="form-check-input fs-6" type="checkbox" value="2" name="prescription_follow_up_instructions[]" id="one_week">
                                                    <label class="form-check-label fs-6" for="one_week">
                                                    ایک ہفتہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-3">
                                                    <input class="form-check-input fs-6" type="checkbox" value="3" name="prescription_follow_up_instructions[]" id="two_week">
                                                    <label class="form-check-label fs-6" for="two_week">
                                                    دو ہفتہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-3">
                                                    <input class="form-check-input fs-6" type="checkbox" value="4" name="prescription_follow_up_instructions[]" id="one_month">
                                                    <label class="form-check-label fs-6" for="one_month">
                                                    ایک ماہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 p-0 mt-2">
                                            <input type="textarea" class="form-control shadow" name="prescription_second_other" placeholder="other">
                                        </div>
                                    </div> 
                                </div>
                            </div>

                             <!-- Medication section collapse list form-->
                             <div class="col-md-12">
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    
                                    <div class="accordion-body" id="parent-container" >

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-end mt-4">
                                            <button type="button" class="btn btn-primary" id="clonebutton" name="medicine_add"><i class="bi bi-patch-plus"></i>Drugs</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="col-md-12 p-0 mt-2 d-flex align-items-end">
                                <button class="btn btn-primary me-2" type="submit" id="dischargesave">Save and Print</button>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </form>                      
    </div>
@endsection