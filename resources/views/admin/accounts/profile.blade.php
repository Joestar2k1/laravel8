@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="{{asset('backend/assets/img/avaters/avatar1.png')}}">
                <span class="font-weight-bold">Nguyễn hoài chương</span>
                <span class="text-black-50">@caothang.edu.vn</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thiết lập hồ sơ</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Họ tên</label>
                        <input type="text" class="form-control" name="fullName"placeholder="first name" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Tên hiển thị</label>
                        <input type="text" class="form-control" name="username" value="" placeholder="surname">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Số điện thoại</label>
                        <input type="number" class="form-control"name="phone" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Địa chỉ </label>
                        <input type="text" class="form-control"name="address"placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Nhân viên</label>
                        <input type="text" class="form-control" name="isAdmin" placeholder="" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Country</label>
                        <input type="text" class="form-control" placeholder="country" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">State/Region</label>
                        <input type="text" class="form-control" value="" placeholder="state">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span>Edit Experience</span>
                    <span class="border px-3 p-1 add-experience">
                        <i class="fa fa-plus"></i>
                        &nbsp;Experience
                    </span>
                </div>
                <br>
                <div class="col-md-12">
                    <label class="labels">Experience in Designing</label>
                    <input type="text" class="form-control" placeholder="experience" value="">
                </div> <br>
                <div class="col-md-12">
                    <label class="labels">Additional Details</label>
                    <input type="text" class="form-control" placeholder="additional details" value="">
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection