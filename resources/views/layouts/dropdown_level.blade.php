<div id="leveldrop">


<link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
<span class="custom-dropdown big">
    <select name="level_name[]">
      <?php
        $allLevel = DB::table('level')->get();
        ?>
        @foreach($allLevel as $level)
            <option name="level_name[]"
                    value="{{$level->name}}">{{$level->name}}</option>
        @endforeach
    </select>
</span>
<script src='{{asset('http://ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js')}}'></script>

<script src="{{asset('/js/dropdown.js')}}"></script>


</div>
