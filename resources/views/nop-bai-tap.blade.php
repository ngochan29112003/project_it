@extends('master')
@section('contents')
    <style>
        .upload-card {
            border: none;
            border-radius: 15px;
            background-color: #f8f9fc;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .upload-container {
            border: 2px dashed #0d6efd;
            border-radius: 10px;
            text-align: center;
            padding: 30px;
            background-color: #eef4ff;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .upload-container:hover,
        .upload-container.dragover {
            background-color: #dbe7ff;
            border-color: #0a58ca;
        }

        .upload-info {
            color: #6c757d;
            font-size: 14px;
            margin-top: 10px;
        }

        .btn-upload {
            margin-top: 20px;
            width: 100%;
        }
    </style>
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card upload-card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Upload file</h4>
                        <div class="upload-container" id="uploadContainer">
                            <i class="bi bi-cloud-upload display-4 text-primary"></i>
                            <p class="mt-2">Drag & Drop your files or <a href="#" id="browseFiles">Browse</a></p>
                            <input type="file" id="fileInput" multiple hidden>
                        </div>
                        <p class="upload-info text-center mt-3">
                            Supported formats: PNG, JPG, PDF, MP4<br>Maximum size: 25MB
                        </p>
                        <button class="btn btn-primary btn-upload">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const uploadContainer = document.getElementById('uploadContainer');
        const fileInput = document.getElementById('fileInput');
        const browseFiles = document.getElementById('browseFiles');

        // Add dragover class on drag
        uploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadContainer.classList.add('dragover');
        });

        // Remove dragover class on drag leave
        uploadContainer.addEventListener('dragleave', () => {
            uploadContainer.classList.remove('dragover');
        });

        // Handle drop event
        uploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadContainer.classList.remove('dragover');
            const files = Array.from(e.dataTransfer.files);
            console.log(files); // Handle files here
        });

        // Open file input on click
        uploadContainer.addEventListener('click', () => fileInput.click());
        browseFiles.addEventListener('click', (e) => {
            e.preventDefault();
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            console.log(files); // Handle files here
        });
    </script>
    </body>
@endsection
