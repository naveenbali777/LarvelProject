<div  class="col-sm-12 setting-title">
    <div><span><i class="fa fa-link"></i></span> Setup Death Plan</div>
</div>
<form method="POST" action="{{ route('death.plan') }}">
    {{ csrf_field() }}                                        

    <div  class="col-sm-12 mar-bet">
        <div class="row">
        @if(count($dp_detail) > 0)

        <div  class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="now" {{ ($dp_detail->opt == 'now') ? 'checked' : '' }}> Now</div>
            <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').show();" value="later"  {{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? 'checked' : '' }}>Later
            <p style="{{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? '' : 'display:none' }}" id="show-date">Date: <input type="text" id="datepicker" placeholder="date" name="plan_date" value="{{ ($dp_detail->opt != 'now' && $dp_detail->opt != 'hereafter') ? $dp_detail->opt : '' }}"></p> </div>                                
            <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="hereafter" {{ ($dp_detail->opt == 'hereafter') ? 'checked' : '' }}>Hereafter</div>                                                       
        </div> 


        @else

        <div  class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="now"> Now</div>
            <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').show();" value="later" > Later
            <p style="display:none" id="show-date">Date: <input type="text" id="datepicker" placeholder="date" name="plan_date"></p> </div>                                
            <div class="col-sm-4"><input type="radio" name="plan" onclick="$('#show-date').hide();" value="hereafter"> Hereafter</div>                                                       
        </div>

        @endif
    </div> 

    <br><br>

    <div class="col-sm-12 mar-bet">
        <button class="templ-btn pull-right">Active</button>
    </div> 
</form>


@push('scripts')
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
</script>
@endpush