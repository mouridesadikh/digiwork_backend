@extends('../layouts.header_admin')

@section('content')
@if($message)

          @if($message === 'success' && $code === 1)
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
                <h3>Insertions reussit</h3>
          </div>
          @endif
          @if($message === 'error' && $code === 1)
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <h3>Probleme d'insertion</h3>
          </div>
          @endif
          @if($message === 'success' && $code === 2)
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <h3>suppression reussit</h3>
          </div>
          @endif
          @if($message === 'error' && $code === 2)
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <h3>Probleme avec la suppression</h3>
          </div>
          @endif

      @endif
<div class="br-mainpane">
    <div class="br-pagetitle text-right" >
       
      
      {{-- <button class="btn btn-outline-primary  pull-left btn-oblong bd-2 pd-x-30 pd-y-15 tx-uppercase tx-bold tx-spacing-6 tx-12">
      <a href="{{route('addDomaine')}}">@lang('addDomaine')</a>
      </button> --}}
      <div   style="background-color: #fff ; width: 100%;">
        <br><br>
        <div class="row">
          <div class="col-5">
            <fieldset class="scheduler-border">
              <legend class="scheduler-border">Domaine section</legend>
            <form method="post" action="{{route('saveDomaine')}}" enctype="multipart/form-data">
              @csrf
              <div class="wd-300">
                <div class="d-flex ">
                  <div class="form-group">
                    <input type="text" name="libele"  placeholder="@lang('enter domaine')" class="form-control wd-250  @error('libele') is-invalid @enderror"  value="{{ old('libele') }}" required autocomplete="libele" autofocus>
                    @error('libele')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div> &nbsp;&nbsp;&nbsp;
                  <div class="form-group  ">
                      <input type="file" name="image" accept="image/png, image/jpeg"  class="form-control wd-250 ">
                  </div>&nbsp;&nbsp;&nbsp;
                 
                  <div class="form-group">
                    
                      <button type="submit" class="btn btn-info">Valider</button>
                  </div>
                </div><!-- d-flex -->
                
              </div>
            </form>
            </fieldset>
          </div>
          <div class="col-7">
            <fieldset class="scheduler-border">
              <legend class="scheduler-border">Spécialité section</legend>
            <form method="post" action="{{route('saveSpecialite')}}" enctype="multipart/form-data">
              @csrf
              <div class="">
                <div class="d-flex" >
                  <div id="slWrapper " class=" form-group  parsley-select wd-250">
                    <select class="form-control select2" data-placeholder="Choose one"
                    data-parsley-class-handler="#slWrapper"
                    data-parsley-errors-container="#slErrorContainer" name="id_domaine" required>
                      <option label="Choose one"></option>
                      @foreach($resultat as $rs)
                      <option value="{{$rs->id}}">{{$rs->libele}}</option>
                      @endforeach
                    </select>
                    <div id="slErrorContainer"></div>
                  </div>&nbsp;&nbsp;&nbsp;
           
                  <div class="form-group ">
                    <input type="text" name="libele"  placeholder="@lang('enter domaine')" class="form-control wd-250  @error('libele') is-invalid @enderror"  value="{{ old('libele') }}" required autocomplete="libele" autofocus>
                    @error('libele')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-group  ">
                      <input type="file" name="image" accept="image/png, image/jpeg"  class="form-control wd-250 ">
                  </div>&nbsp;&nbsp;&nbsp;
                  
                  <div class="form-group   ">
                    
                      <button type="submit" class="btn btn-info">Valider</button>
                  </div>
                </div><!-- d-flex -->
                
              </div>
            </form>
            </fieldset>
          </div>
         
        </div>
   

     </div>
       
    </div>
    <div class="br-pagebody">
{{-- <div class="table-wrapper">
    <table id="datatable2" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-15p">Numéro</th>
          <th class="wd-15p">Nom</th>
          <th class="wd-20p">Image</th>
          <th class="wd-15p">Action</th>
        
        </tr>
      </thead>
      <tbody>
      @if($resultat)
          
  
        @foreach($resultat as $rs)
        <tr>
        <td>{{$rs->id}}</td>
        <td>{{$rs->libele}}</td>
        <td><img src="{{'data:image/jpeg;base64,'.$rs->images}}" class="avatar" alt=""></td>
          <td></td>

        </tr>
        @endforeach

      @endif
      </tbody>
    </table>
  </div> --}}

  <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
    @if($resultat)
          
  
    @foreach($resultat as $rs)
    <div class="card">
      <div class="card-header" role="tab" id="headingOne" style="background-color: #17A2B8;">
        <h6 class="mg-b-0">
          <a data-toggle="collapse" data-parent="#accordion" href="#{{'domaine_'.$rs->id}}"
          aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
          <h3 style="color: #fff">{{$rs->libele}}</h3>
          </a>
        </h6>
         <a class="close" href="{{route('deleteDomaine' , [$rs->id])}}"><i class="fa fa-trash"></i></a>
      </div><!-- card-header -->
  
      <div id="{{'domaine_'.$rs->id}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-block pd-20">
          <div class="row">
           
          @foreach($rs->specialite as $r)
          <div class="col-2">
            <div class="card">
              <div class="card-body">
                <br>
                <p><b>{{$r->libele}}</b>
                  <a class="close"  style="zoom: 0.75 ; color: red" href="{{route('deleteSpecialite',[$r->id])}}"> <i class="fa fa-trash"></i></a></p>
              </div>
              <img class="card-img-top img-fluid" src="{{'data:image/jpeg;base64,'.$r->images}}" alt="Image">
            </div>
        </div>
          @endforeach
        </div>
        </div>
      </div>
    </div>
    @endforeach

    @endif
  </div>


</div>
</div>
@endsection