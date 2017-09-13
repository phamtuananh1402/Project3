<div class="row studentskills">
    <div class="col-md-12">
        <div class="cvsubheader">
            WHICH SKILLS DO YOU HAVE?
        </div>
    </div>

    <div class="col-md-12">
        <div class="example">NOTE: You can pick more than one.</div>
    </div>

    <div class="col-md-12">
        <div class="allskills">
            <div class="col-md-4">
                @foreach($skills as $sk)
                    {{$sk->name}} <input type="checkbox" name="skills_name[]" value="{{$sk->name}}"> ---

                @endforeach
            </div>
        </div>

        <div class="allLevel">
            <div class="col-md-4">
                @foreach($level as $lvl)
                    {{$lvl->name}} <input type="checkbox" name="level_name[]" value="{{$lvl->name}}">
                @endforeach
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::check('company') == true)
            <div class="allLevel">
                <div class="col-md-4">
                    @foreach($field as $f)
                        {{$f->name}} <input type="checkbox" name="field_name[]" value="{{$f->name}}">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

