@extends('layouts.app')
@section('title', 'Discharge')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.3/typeahead.bundle.min.js" integrity="sha512-E4rXB8fOORHVM/jZYNCX2rIY+FOvmTsWJ7OKZOG9x/0RmMAGyyzBqZG0OGKMpTyyuXVVoJsKKWYwbm7OU2klxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container-fluid">
        <form id="dischargeform" method="POSt" action="/discharge_csutomer">
            @csrf
            <div class="row d-flex align-content-center">
                <h4 class="col-12 pb-2 text-start">Add Health Record</h4>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row grid gap-2">
                        <div class="col-md-auto col-sm-12">
                            <div class="input-group">
                            <input type="text" id="inputField" autocomplete="off" class="form-control rounded-end rounded-5" name="discharge_patient_name" placeholder="Search By Name, Mr#, or Phone">
                            <div id="suggestions"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-12 d-none d-md-block">
                            <button class="btn btn-primary"><strong>Add Patient</strong><i class="bi bi-plus"></i></button>
                        </div>
                        <div class="col-md-auto col-sm-6 d-flex align-items-center">
                            <label class="form-label me-1 mt-2" for="doa">Date&nbsp;of&nbsp;Admission</label>
                            <input type="date" class="form-control rouded rounded-5" id="doa" name="discharge_admission_date">
                        </div>
                        <div class="col-md-auto col-sm-6 d-flex align-items-center">
                            <label class="form-label me-1 mt-2" for="dod">Date&nbsp;of&nbsp;Discharge</label>
                            <input type="date" class="form-control rouded rounded-5" id="dod" name="discharge_discharge_date">
                        </div>
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
                                        <div class="row  d-flex d-inline-flex" id="interface-container">
                                            <div class="col-md-3 mt-2 p-0">
                                                <label for="medication_name" class="form-label m-0 strong fs-6">Name</label>
                                                <input type="text" class="form-control shadow" autocomplete="off" id="medication_name" name="medication_name[]">
                                                <div id="medicinesug"></div>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled>
                                                    <input type="text" class="form-control shadow" id="medication_name" name="medicationname[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mt-2 p-0">
                                                <label for="medication_duration" class="form-label m-0 strong fs-6">Duration</label>
                                                <input type="text" class="form-control shadow" id="medication_duration" name="medication_duration_sequence[]">
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
                                                <label for="medication_dosage" class="form-label m-0 strong fs-6">Dosage</label>
                                                <input type="text" class="form-control shadow" id="medication_dosage" name="medication_dosage_input[]">
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
                                            <div class="col-md-2 mt-2 p-0">
                                                <label for="medication_instruction" class="form-label m-0 strong fs-6">Instruction</label>
                                                <input type="text" class="form-control shadow" id="medication_instruction" name="medication_instruction[]">
                                            </div>
                                            <div class="col-md-1 mt-2 p-0 d-flex align-items-center">
                                                <button class="btn btn-default delete-button btnremove" id="deletebutton" name="medication_del[]"><i class="bi bi-trash3 fs-5"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-end mt-4">
                                            <button class="btn btn-primary" id="clonebutton" name="medicine_add"><i class="bi bi-patch-plus"></i>Drugs</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="col-md-12 p-0 mt-2 d-flex align-items-end">
                                <button class="btn btn-primary me-2" type="submit" id="dischargesave">Save</button>
                                <button class="btn btn-primary" id="dischargeprint" onclick="openPopup()">Print</button>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </form>                      
    </div>
@endsection