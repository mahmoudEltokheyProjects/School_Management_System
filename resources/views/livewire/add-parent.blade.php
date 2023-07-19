<div>
    {{-- +++++++++++++++++++++++++++++ Success Message +++++++++++++++++++++++++++++ --}}
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    {{-- +++++++++++++++++++++++++++++ Error Message +++++++++++++++++++++++++++++ --}}
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif
    {{-- +++++++++++++++++++++++++++++ Wizard Form : 3 Steps Form +++++++++++++++++++++++++++++ --}}

        {{-- @if($show_table)
            @include('livewire.Parent_Table')
        @else --}}
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p>{{ trans('Parent_trans.Step1') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p>{{ trans('Parent_trans.Step2') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                           class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                           disabled="disabled">3</a>
                        <p>{{ trans('Parent_trans.Step3') }}</p>
                    </div>
                </div>
            </div>
    {{-- +++++++++++++++++++ Step 1 : "Mother Form" Blade Page +++++++++++++++++++ --}}
    @include('livewire.Mother_Form')
    {{-- +++++++++++++++++++ Step 2 : "Father Form" Blade Page +++++++++++++++++++ --}}
    @include('livewire.Father_Form')
    {{-- +++++++++++++++++++ Step 3 : "Confirmation" Blade Page  +++++++++++++++++++ --}}
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
                <div class="col-xs-12">
                    <div class="col-md-12"><br>
                        {{-- +++++++++++ Parent Attachments  +++++++++++ --}}
                        <label style="color: red">{{trans('Parent_trans.Attachments')}}</label>
                        <div class="form-group">
                            <input type="file" wire:model="photos" accept="image/*" multiple>
                        </div>
                        <br>
                        {{-- +++++++++++ hidden inputField : parent id +++++++++++ --}}
                        <input type="hidden" wire:model="Parent_id">
                        {{-- +++++++++++ Back Button +++++++++++ --}}
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(2)">
                            {{ trans('Parent_trans.Back') }}
                        </button>
                        {{-- +++++++++++ Submit Button +++++++++++ --}}
                        <button class="btn btn-success btn-sm btn-lg pull-right" type="button" wire:click="submitForm">
                            {{ trans('Parent_trans.Finish') }}
                        </button>
                    </div>
                </div>
            </div>
        {{-- @endif --}}
    </div>
