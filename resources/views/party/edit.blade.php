@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Edit Party </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- Start Form  -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-uppercase"> Basic Info</h4>
                        <hr>
                        <form class="needs-validation" method="POST"
                            action="{{ route('handal.party.update', $party->id) }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Type</label>
                                        <select name="party_type"
                                            class="form-control border-bottom @error('party_type') input-invalid @enderror"
                                            id="party_type">
                                            <option value="">Select Party Type</option>
                                            @foreach (\App\Enums\PartyType::cases() as $type)
                                                <option value="{{ $type->value }}" @selected(old('party_type', $party->party_type) == $type->value)>
                                                    {{ $type->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('party_type')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Full Name <em>*</em></label>
                                        <input type="text" name="full_name"
                                            value="{{ old('full_name', $party->full_name) }}"
                                            class="form-control border-bottom @error('full_name') input-invalid @enderror"
                                            id="validationCustom01" placeholder="Enter client's full name">
                                        @error('full_name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Phone/Mobile Number <em>*</em></label>
                                        <input type="number" name="phone_no"
                                            value="{{ old('phone_no', $party->phone_no) }}"
                                            class="form-control border-bottom @error('phone_no') input-invalid @enderror"
                                            id="validationCustom02" placeholder="Enter phone/mobile number">
                                        @error('phone_no')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address</label>
                                        <input type="text" name="address" value="{{ old('address', $party->address) }}"
                                            class="form-control border-bottom  @error('address') input-invalid  @enderror"
                                            id="validationCustom02" placeholder="Enter Address">
                                        @error('address')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <h4 class="header-title text-uppercase">Bank Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom04">Account Holder Name</label>
                                        <input type="text" name="account_holder_name"
                                            value="{{ old('account_holder_name', $party->account_holder_name) }}"
                                            class="form-control border-bottom @error('account_holder_name') input-invalid @enderror"
                                            id="validationCustom04" placeholder="Enter Accoumt Holder name">
                                        @error('account_holder_name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom05">Account Number</label>
                                        <input type="text" name="account_no"
                                            value="{{ old('account_no', $party->account_no) }}"
                                            class="form-control border-bottom @error('account_no') input-invalid @enderror"
                                            id="validationCustom05" placeholder="Enter Account Number">
                                        @error('account_no')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Bank Name</label>
                                        <input type="text" name="bank_name"
                                            value="{{ old('bank_name', $party->bank_name) }}"
                                            class="form-control border-bottom @error('bank_name') input-invalid @enderror"
                                            id="validationCustom02" placeholder="Enter Bank Name">
                                        @error('bank_name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">IFSC Code</label>
                                        <input type="text" name="ifsc_code"
                                            value="{{ old('ifsc_code', $party->ifsc_code) }}"
                                            class="form-control border-bottom @error('ifsc_code') input-invalid @enderror"
                                            id="validationCustom02" placeholder="Enter IFSC Code">
                                        @error('ifsc_code')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">ZIP Code</label>
                                        <input type="text" class="form-control border-bottom " id="validationCustom02"
                                            placeholder="Enter ZIP Code" >
                                        <div class="invalid-feedback">
                                            Please provide a Zip.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">State</label>
                                        <input type="text" class="form-control border-bottom " id="validationCustom02"
                                            placeholder="Enter State" >
                                        <div class="invalid-feedback">
                                            Please provide a State.
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="validationCustom02">Branch</label>
                                    <input type="text" name="branch_address"
                                        value="{{ old('branch_address', $party->branch_address) }}"
                                        class="form-control border-bottom @error('branch_address') input-invalid @enderror"
                                        id="validationCustom02" placeholder="Enter Branch">
                                    @error('branch_address')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('manage-party') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
