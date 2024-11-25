@php
    $user = Auth::user();
@endphp

@extends('template.layout')

@section('title', 'Halaman Pengaturan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <!-- Menambahkan CSS langsung di sini -->
    <style>
        body {
            background-color: #f3e5f5;
            color: #4a148c;
        }

        .btn-primary {
            background-color: #ce93d8;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ba68c8;
        }

        .form-label {
            color: #6a1b9a;
        }

        .form-control {
            border-color: #ce93d8;
        }

        .card {
            background-color: #f8f3fa;
            color: #4a148c;
            border-color: #ce93d8;
        }

        .breadcrumb {
            background-color: #f8f3fa;
        }

        .breadcrumb .breadcrumb-item a {
            color: #6a1b9a;
        }

        .breadcrumb .breadcrumb-item.active {
            color: #4a148c;
        }

        footer {
            background-color: #f8f3fa;
            color: #4a148c;
        }
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pengaturan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Pengaturan Akun</li>
                    </ol>
                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="d-flex align-items-center gap-4">
                        @if ($user->user_pict_url === '')
                            <img src="{{ asset('img/placeholder.png') }}" alt="..." style="width: 140px; height: 140px;" class="rounded-circle img-profile img-thumbnail">
                        @else
                            <img src="{{ asset('storage/profile_pictures/'.basename($user->user_pict_url)) }}" alt="..." style="width: 140px; height: 140px;" class="rounded-circle img-profile img-thumbnail">
                        @endif
                        {{-- Upload Profile Form --}}
                        <form action="{{ route('action.upload_profile', ['id' => $user->user_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="profile" class="form-label">Upload Profile</label>
                                <input type="file" name="profile" id="profile" class="form-control">
                            </div>
                            <div class="form-group my-3">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            @include('template.footer')
        </div>
    </div>
@endsection
