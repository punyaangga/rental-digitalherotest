<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<!-- core:css -->
<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/dropify/dist/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')}}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<!-- endinject -->

<!-- Layout styles -->  
<link rel="stylesheet" href="{{asset('assets/css/demo1/style.css')}}">
<!-- End layout styles -->
<style>
    .table td, .table th {
        white-space: nowrap; /* Prevent text from wrapping */
        overflow: hidden; /* Hide overflowing text */
        text-overflow: ellipsis; /* Add ellipsis (...) for overflowing text */
    }
    
    .table th:nth-child(1), .table td:nth-child(1) {
        max-width: 50px;
    }
    .table th:nth-child(2), .table td:nth-child(2) {
        max-width: 200px;
    }
    .table th:nth-child(3), .table td:nth-child(3) {
        max-width: 300px;
    }
    .table th:nth-child(4), .table td:nth-child(4) {
        max-width: 100px;
    }
</style>