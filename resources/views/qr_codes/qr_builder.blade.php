@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('QR Builder') }}
                        <div class="ml-auto">
                            <a href="{{ route('qr_builder') }}">QR Builder</a> -
                            <a href="{{ route('qr_phone') }}">Phone</a> -
                            <a href="{{ route('qr_email') }}">Email</a> -
                            <a href="{{ route('qr_geo') }}">GEO</a> -
                            <a href="{{ route('qr_sms') }}">SMS</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-8">
                                <form method="post" action="{{ route('do_qr_builder') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <input type="text" name="body" value="{{ old('body') }}" class="form-control">
                                        @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr_attachment">QR Attachment</label>
                                                <select name="qr_attachment" class="form-control">
                                                    <option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_size">QR Size</label>
                                                <select name="qr_size" class="form-control">
                                                    <option value="">Select size</option>
                                                    <option value="300">300x300</option>
                                                    <option value="600">600x600</option>
                                                    <option value="900">900x900</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_img_type">Image Type</label>
                                                <select name="qr_img_type" class="form-control">
                                                    <option value="">Select Image type</option>
                                                    <option value="png">PNG</option>
                                                    <option value="svg">SVG</option>
                                                    <option value="eps">EPS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_correction">QR Correction</label>
                                                <select name="qr_correction" class="form-control">
                                                    <option value="">Select QR Correction</option>
                                                    <option value="L">7%</option>
                                                    <option value="M">15%</option>
                                                    <option value="Q">25%</option>
                                                    <option value="H">30%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_encoding">QR Encoding</label>
                                                <select name="qr_encoding" class="form-control">
                                                    <option value="">Select QR Encoding</option>
                                                    <option value="UTF-8">UTF-8</option>
                                                    <option value="ISO-8859-1">ISO-8859-1</option>
                                                    <option value="ISO-8859-2">ISO-8859-2</option>
                                                    <option value="ISO-8859-3">ISO-8859-3</option>
                                                    <option value="ISO-8859-4">ISO-8859-4</option>
                                                    <option value="ISO-8859-5">ISO-8859-5</option>
                                                    <option value="ISO-8859-6">ISO-8859-6</option>
                                                    <option value="ISO-8859-7">ISO-8859-7</option>
                                                    <option value="ISO-8859-8">ISO-8859-8</option>
                                                    <option value="ISO-8859-9">ISO-8859-9</option>
                                                    <option value="ISO-8859-10">ISO-8859-10</option>
                                                    <option value="ISO-8859-11">ISO-8859-11</option>
                                                    <option value="ISO-8859-12">ISO-8859-12</option>
                                                    <option value="ISO-8859-13">ISO-8859-13</option>
                                                    <option value="ISO-8859-14">ISO-8859-14</option>
                                                    <option value="ISO-8859-15">ISO-8859-15</option>
                                                    <option value="ISO-8859-16">ISO-8859-16</option>
                                                    <option value="SHIFT-JIS">SHIFT-JIS</option>
                                                    <option value="WINDOWS-1250">WINDOWS-1250</option>
                                                    <option value="WINDOWS-1251">WINDOWS-1251</option>
                                                    <option value="WINDOWS-1252">WINDOWS-1252</option>
                                                    <option value="WINDOWS-1256">WINDOWS-1256</option>
                                                    <option value="UTF-16BE">UTF-16BE</option>
                                                    <option value="ASCII">ASCII</option>
                                                    <option value="GBK">GBK</option>
                                                    <option value="EUC-KR">EUC-KR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_eye">QR Eye</label>
                                                <select name="qr_eye" class="form-control">
                                                    <option value="">Select size</option>
                                                    <option value="square">Square</option>
                                                    <option value="circle">Circle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_margin">QR Margin</label>
                                                <input type="number" name="qr_margin" value="{{ old('qr_margin', 0) }}" min="0" max="100" step="1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_style">QR Style</label>
                                                <select name="qr_style" class="form-control">
                                                    <option value="">Select QR Style</option>
                                                    <option value="square">Square</option>
                                                    <option value="dot">Dot</option>
                                                    <option value="round">Round</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr_color">QR Color</label>
                                                <input type="color" name="qr_color" value="{{ old('qr_color', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_background_color">QR Background Color</label>
                                                <input type="color" name="qr_background_color" value="{{ old('qr_background_color', '#FFFFFF') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_background_transparent">QR Background transparent</label>
                                                <input type="number" name="qr_background_transparent" value="{{ old('qr_background_transparent', 0) }}" min="0" max="100" step="1" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_inner_0">QR Eye Color inner 0</label>
                                                <input type="color" name="qr_eye_color_inner_0" value="{{ old('qr_eye_color_inner_0', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_outer_0">QR Eye Color outer 0</label>
                                                <input type="color" name="qr_eye_color_outer_0" value="{{ old('qr_eye_color_outer_0', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_inner_1">QR Eye Color inner 1</label>
                                                <input type="color" name="qr_eye_color_inner_1" value="{{ old('qr_eye_color_inner_1', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_outer_1">QR Eye Color outer 1</label>
                                                <input type="color" name="qr_eye_color_outer_1" value="{{ old('qr_eye_color_outer_1', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_inner_2">QR Eye Color inner 2</label>
                                                <input type="color" name="qr_eye_color_inner_2" value="{{ old('qr_eye_color_inner_2', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr_eye_color_outer_2">QR Eye Color outer 2</label>
                                                <input type="color" name="qr_eye_color_outer_2" value="{{ old('qr_eye_color_outer_2', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr_gradient_start">QR Gradient start</label>
                                                <input type="color" name="qr_gradient_start" value="{{ old('qr_gradient_start', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr_gradient_end">QR Gradient end</label>
                                                <input type="color" name="qr_gradient_end" value="{{ old('qr_gradient_end', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr_gradient_type">QR Gradient type</label>
                                                <select name="qr_gradient_type" class="form-control">
                                                    <option value="">Select type</option>
                                                    <option value="vertical">Vertical</option>
                                                    <option value="horizontal">Horizontal</option>
                                                    <option value="diagonal">Diagonal</option>
                                                    <option value="inverse_diagonal">Inverse diagonal</option>
                                                    <option value="radial">Radial</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Generate QR Code
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <div class="col-4">
                                @if (session('code'))
                                    @if (pathinfo(session('code'))['extension'] === 'eps')
                                        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to download it.
                                    @else
                                        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}" class="img-fluid">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
