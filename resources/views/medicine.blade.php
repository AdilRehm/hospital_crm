@extends('layouts.app')
@section('title', isset($medicine) ? 'Update Medicine' : 'Add New Medicine')

@section('content')
    <div class="container">
        <form class="" method="POST" action="{{ isset($medicine) ? route('medicine.update') : route('medicine.store') }}">
            @csrf
            

            <div class="row d-flex align-content-center">
                <h4 class="col-12 pb-2 text-center">{{ isset($medicine) ? 'Update Item' : 'Add Item' }}</h4>
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
                            <label for="remark" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="remark" class="form-control" name="medicine_remarks" required aria-describedby="salthelpname" placeholder="Kindly enter remarks" value="{{ isset($medicine) ? $medicine->medicine_remarks : '' }}">
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary" id="medicine_submit">
                                @if (isset($medicine))
                                Update
                                @else
                                Add
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection