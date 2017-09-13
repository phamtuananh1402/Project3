<link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
<span class="custom-dropdown big">
    <select name="field_name[]">
      <?php
        $allField = DB::table('field')->get();
        ?>
        @foreach($allField as $field)
        
            <option name="field_name[]"
                    value="{{$field->name}}">{{$field->name}}</option>
        @endforeach
    </select>
</span>
<script src='{{asset('http://ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js')}}'></script>

<script src="{{asset('/js/dropdown.js')}}"></script>
