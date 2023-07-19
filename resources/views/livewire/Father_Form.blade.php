@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                {{-- ================================ Row 1 ================================ --}}
                <div class="form-row">
                    {{-- Email inputField --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Email')}}</label>
                        <input type="email" wire:model="Email"  class="form-control">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Password inputField --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Password')}}</label>
                        <input type="password" wire:model="Password" class="form-control" >
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- ================================ Row 2 ================================ --}}
                <div class="form-row">
                    {{-- Column 1 : Arabic "Name_Father" --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                        <input type="text" wire:model="Name_Father" class="form-control" >
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 1 : English "Name_Father" --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                        <input type="text" wire:model="Name_Father_en" class="form-control" >
                        @error('Name_Father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- ================================ Row 3 ================================ --}}
                <div class="form-row">
                    {{-- Column 1 : Arabic "Job_Father" --}}
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                        <input type="text" wire:model="Job_Father" class="form-control">
                        {{-- Error Message --}}
                        @error('Job_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 2 : English "Job_Father" --}}
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                        <input type="text" wire:model="Job_Father_en" class="form-control">
                        {{-- Error Message --}}
                        @error('Job_Father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 3 : "National_ID_Father" --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control">
                        {{-- Error Message --}}
                        @error('National_ID_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 4 : "Passport_ID_Father" --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                        <input type="text" wire:model="Passport_ID_Father" class="form-control">
                        {{-- Error Message --}}
                        @error('Passport_ID_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 5 : "Phone_Father" --}}
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        {{-- Error Message --}}
                        @error('Phone_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                {{-- ================================ Row 4 ================================ --}}
                <div class="form-row">
                    {{-- Column 1 : "Nationality_Father_id" Selectbox --}}
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->Name}}</option>
                            @endforeach
                        </select>
                        {{-- Error Message --}}
                        @error('Nationality_Father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 2 : "Blood_Type_Father_id" Selectbox --}}
                    <div class="form-group col">
                        <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->Name}}</option>
                            @endforeach
                        </select>
                        {{-- Error Message --}}
                        @error('Blood_Type_Father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Column 3 : "Religion_Father_id" Selectbox --}}
                    <div class="form-group col">
                        <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->Name}}</option>
                            @endforeach
                        </select>
                        {{-- Error Message --}}
                        @error('Religion_Father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- ================================ Row 5 ================================ --}}
                {{-- ++++++++++++++++++++++++++ "Parent Address" Textarea ++++++++++++++++++++++++++ --}}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                    <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                    {{-- Error Message --}}
                    @error('Address_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- ================================ Row 6 ================================ --}}
                {{-- ++++++++++++++++++++++++++ "First Next" Button ++++++++++++++++++++++++++ --}}
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">{{trans('Parent_trans.Next')}}
                </button>

            </div>
        </div>
    </div>
