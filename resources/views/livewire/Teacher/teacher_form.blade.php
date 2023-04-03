@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Email')}}</label>
                        <input type="email" wire:model="email"  class="form-control">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Password')}}</label>
                        <input type="password" wire:model="password" class="form-control" >
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                        <input type="text" wire:model="name" class="form-control" >
                        @error('Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                        <input type="text" wire:model="Name_en" class="form-control" >
                        @error('Joining_Date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                        <input type="date" wire:model="Joining_Date"  class="form-control">
                        @error('Joining_Date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Address')}}</label>
                        <input type="text" wire:model="Address" class="form-control" >
                        @error('Address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('Teacher_trans.specialization')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Specialization_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($sps as $sps)
                                <option value="{{$sps->id}}">{{$sps->Name}}</option>
                            @endforeach
                        </select>
                        @error('sps')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('Teacher_trans.Gender')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Gender_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($GNS as $Gender)
                                <option value="{{$Gender->id}}">{{$Gender->Name}}</option>
                            @endforeach
                        </select>
                        @error('Gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>




                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                            type="button">save
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">save
                    </button>
                @endif

            </div>
        </div>
    </div>
