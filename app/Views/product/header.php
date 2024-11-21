 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Digital Catalog</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
         /* Tambahan custom style untuk header */
         .custom-header {
             background: linear-gradient(to right, #4e73df, #224abe);
             color: white;
             padding: 15px 30px;
         }

         .custom-header .title {
             font-size: 1.8rem;
             font-weight: bold;
             letter-spacing: 1px;
         }

         .custom-header .breadcrumb {
             background: transparent;
             margin-bottom: 0;
             padding: 0;
         }

         .custom-header .breadcrumb a {
             color: #f8f9fc;
             text-decoration: none;
         }

         .custom-header .breadcrumb a:hover {
             text-decoration: underline;
         }
     </style>
 </head>

 <body>
     <!-- Header Section -->
     <div class="custom-header d-flex justify-content-between align-items-center">
         <div class="title">Digital Catalog</div>
         <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Digital Catalog</li>
             </ol>
         </nav>
     </div>
 </body>

 </html>