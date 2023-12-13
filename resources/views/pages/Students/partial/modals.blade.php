{{-- //////////////////////////////////////////// Models //////////////////////////////////////////// --}}
<!-- ================== Modal 1 : createRegionModal ================== -->
    <div class="modal fade" id="createRegionModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  rollIn  animated" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Student_trans.add_city')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('students.storeRegion') }}" method='post' id='student-region-form'>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- store selected "state_id" to store it in "cities table" in DB --}}
                            <input type="hidden" name="state_id" id="stateId" />
                            <label for="name">@lang('Student_trans.city_name')</label>
                            <div class="select_body d-flex justify-content-between align-items-center" >
                                <input type="text" required
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}" >
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Student_trans.Close')</button>
                        <button  type="submit" class="btn btn-primary">{{__('Student_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ================== Modal 2 : createQuarterModal ================== -->
    <div class="modal fade" id="createQuarterModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  rollIn  animated" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Student_trans.add_quarter')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('students.storeQuarter') }}" method='post' id='student-quarter-form'>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- store selected "city_id" to store it in "quarters table" in DB --}}
                            <input type="hidden" name="city_id" id="cityId" />
                            <label for="name">@lang('Student_trans.quarter_name')</label>
                            <div class="select_body d-flex justify-content-between align-items-center" >
                                <input type="text" required
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}" >
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Student_trans.Close')</button>
                        <button  type="submit" class="btn btn-primary">{{__('Student_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
