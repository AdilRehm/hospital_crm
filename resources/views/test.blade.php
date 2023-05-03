<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" class="form-control rounded-end rounded-5 " id="item_n" name="search[]" list="item_n" placeholder="Search by name" aria-describedby="btnGroupAddon" placeholder="Search By Name, Mr#, or Phone">
                                <datalist id="item_n" style="display:block !important" >
        @foreach($patient as $item)
    
              <option id="{{$item->id}}" value="{{$item->patient_name}}">{{$item->patient_name}}</option>
         @endforeach
   </datalist>
</body>
</html>