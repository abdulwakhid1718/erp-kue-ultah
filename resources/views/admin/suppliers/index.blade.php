@extends('layouts.app')

@section('title', 'Supplier')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Supplier</h1>
        @if (session('success'))
            <div class="toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="2000">
                <div class="toast-header">
                    <strong class="me-auto">Sukses</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif

    </div>

    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0; @endphp
            @foreach ($suppliers as $supplier)
                @php $no++; @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->nomor_telepon }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#supplierModal" data-name="{{ $supplier->nama_supplier }}"
                            data-email="{{ $supplier->email }}" data-phone="{{ $supplier->nomor_telepon }}"
                            data-address="{{ $supplier->alamat }}">
                            <i class="bi bi-info-circle-fill"></i>
                        </button>
                        <a href="/admin/suppliers/{{ $supplier->id }}/edit" type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form id="delete-form-{{ $supplier->id }}" action="/admin/suppliers/{{ $supplier->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $supplier->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/admin/suppliers/create" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i>
        Tambah Supplier
    </a>

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierModalLabel">Detail Supplier
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="supplierName" class="form-label">Nama Supplier:</label>
                        <p id="supplierName">John Doe</p>
                    </div>
                    <div class="mb-3">
                        <label for="supplierEmail" class="form-label">Email:</label>
                        <p id="supplierEmail">john.doe@example.com</p>
                    </div>
                    <div class="mb-3">
                        <label for="supplierPhone" class="form-label">Telepon:</label>
                        <p id="supplierPhone">+628123456789</p>
                    </div>
                    <div class="mb-3">
                        <label for="supplierAddress" class="form-label">Alamat:</label>
                        <p id="supplierAddress">Jl. Merdeka No. 123, Jakarta</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var supplierModal = document.getElementById('supplierModal');
            supplierModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var name = button.getAttribute('data-name');
                var email = button.getAttribute('data-email');
                var phone = button.getAttribute('data-phone');
                var address = button.getAttribute('data-address');

                // Update isi modal dengan data yang diambil
                var modalName = supplierModal.querySelector('#supplierName');
                var modalEmail = supplierModal.querySelector('#supplierEmail');
                var modalPhone = supplierModal.querySelector('#supplierPhone');
                var modalAddress = supplierModal.querySelector('#supplierAddress');

                modalName.textContent = name;
                modalEmail.textContent = email;
                modalPhone.textContent = phone;
                modalAddress.textContent = address;
            });
        });
    </script>

@endsection
