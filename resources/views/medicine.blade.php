@extends('layouts.app')
@section('title', isset($medicine) ? 'Update Medicine' : 'Add New Medicine')

@section('content')
    <div class="container">
        <form class="" method="POST" action="{{ isset($medicine) ? route('medicine.update') : route('medicine.store') }}">
            @csrf
            

            <div class="row d-flex align-content-center">
                <h1 class="col-12 pb-2">{{ isset($medicine) ? 'Update Medicine' : 'Add Medicine' }}</h1>
            </div>
            <div class="card shadow">
                <div class="card-body ms-5 my-3">
                    <div class="row g-3 align-items-center">
                        <input type="text" id="id" name="id" value="{{ isset($medicine) ? $medicine->id : '' }}" hidden>
                        <div class="col-4">
                            <label for="itemname" class="col-form-label">Item Name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="itemname" class="form-control" name="medicine_name" required="required" aria-describedby="itemnamehelpname" placeholder="Kindly enter Item name" value="{{ isset($medicine) ? $medicine->medicine_name : '' }}">
                        </div>
                        <div class="col-4">
                            <label for="salt" class="col-form-label">Salt</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="salt" class="form-control" name="medicine_salt" required aria-describedby="salthelpname" placeholder="Kindly enter Salt" value="{{ isset($medicine) ? $medicine->medicine_salt : '' }}">
                        </div>
                        <div class="col-4">
                            <label for="category" class="col-form-label">Category</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" id="category" name="medicine_category" required aria-describedby="categoryhelpname">
                                <option value="">Search for Category</option>
                                <option value="Syrup" {{ isset($medicine) && $medicine->medicine_category == 'Syrup' ? 'selected' : '' }}>Syp</option>
                                <option value="Tablet" {{ isset($medicine) && $medicine->medicine_category == 'Tablet' ? 'selected' : '' }}>Tab</option>
                                <option value="Cap" {{ isset($medicine) && $medicine->medicine_category == 'Cap' ? 'selected' : '' }}>Cap</option>
                                <option value="drop" {{ isset($medicine) && $medicine->medicine_category == 'drop' ? 'selected' : '' }}>Drop</option>
                                <option value="injection IV" {{ isset($medicine) && $medicine->medicine_category == 'injection IV' ? 'selected' : '' }}>Injection IV</option>
                                <option value="injection IM" {{ isset($medicine) && $medicine->medicine_category == 'injection IM' ? 'selected' : '' }}>Injection IM</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="medication_duration" class="form-label m-0 strong fs-6">Duration</label>
                        </div>
                        <div class="col-8 d-flex">
                            <input type="text" class="form-control me-2 shadow" id="medication_duration" name="medicine_duration_sequence">
                            <select class="form-select" name="medication_duration_number">
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
                        <div class="col-4">
                            <label for="medication_dosage" class="form-label m-0 strong fs-6">Dosage</label>
                        </div>
                        <div class="col-8 d-flex">
                            <input type="text" class="form-control shadow me-2" id="medication_dosage" name="medicine_dosage_input">
                            <select class="form-select" name="medication_dosage_select">
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
                        <div class="col-4">
                            <label for="route_" class="form-label m-0 strong fs-6">Route</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="medicine_route" id="route_">
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
                        <div class="col-4">
                            <label for="medicine_instruction" class="form-label m-0 strong fs-6">Instruction</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="medicine_instruction" id="medicine_instruction">
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
                        <div class="col-4">
                            <label for="remark" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="remark" class="form-control" name="medicine_remarks" required aria-describedby="salthelpname" placeholder="Kindly enter remarks" value="{{ isset($medicine) ? $medicine->medicine_remarks : '' }}">
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary" id="medicine_submit">
                                @if (isset($medicine))
                                Update Medicine
                                @else
                                Add Medicine
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection